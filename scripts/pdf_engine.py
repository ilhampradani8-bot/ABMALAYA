#!/usr/bin/env python3
"""
AB Malaya Sdn Bhd - Maritime Requisition PDF Engine
Generates official A4 vector PDFs matching HSEMS Attachment 10.1D standard.
"""

import sys
import os
import json
import base64
import tempfile
from reportlab.lib.pagesizes import A4
from reportlab.platypus import (
    BaseDocTemplate, PageTemplate, Frame, Paragraph, Spacer, Table, TableStyle, Image as RLImage, KeepTogether
)
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.lib import colors
from reportlab.pdfgen import canvas

class MaritimeNumberedCanvas(canvas.Canvas):
    """
    Two-pass canvas that draws authentic repeating HSEMS header on pages 2+,
    and bottom rule line with 'Page X of Y' and 'Section 10' on every page.
    """
    def __init__(self, *args, **kwargs):
        self.logo_path = kwargs.pop('logo_path', None)
        super().__init__(*args, **kwargs)
        self._saved_page_states = []

    def showPage(self):
        self._saved_page_states.append(dict(self.__dict__))
        self._startPage()

    def save(self):
        num_pages = len(self._saved_page_states)
        for state in self._saved_page_states:
            self.__dict__.update(state)
            self.draw_page_decorations(num_pages)
            canvas.Canvas.showPage(self)
        canvas.Canvas.save(self)

    def draw_page_decorations(self, page_count):
        self.saveState()
        margin = 36 # 0.5 inch / 12.7 mm
        page_width, page_height = A4
        printable_width = page_width - (margin * 2)

        # 1. On Pages 2+, repeat the official HSEMS Attachment 10.1D Header
        if self._pageNumber > 1:
            self.draw_repeating_header(margin, page_height - margin, printable_width)

        # 2. Bottom rule line and page numbering
        y_bottom = 24
        self.setStrokeColor(colors.black)
        self.setLineWidth(0.8)
        self.line(margin, y_bottom + 12, page_width - margin, y_bottom + 12)
        
        self.setFont("Times-Roman", 8)
        # Bottom left: Page X of Y
        self.drawString(margin, y_bottom, f"Page {self._pageNumber} of {page_count}")
        # Bottom right: Section 10
        self.drawRightString(page_width - margin, y_bottom, "Section 10")
        self.restoreState()

    def draw_repeating_header(self, x, y_top, width):
        """Draws top header table on subsequent pages."""
        h_table_h = 46
        col_w = [width * 0.28, width * 0.48, width * 0.24]
        
        # Outer box
        self.setStrokeColor(colors.black)
        self.setLineWidth(1)
        self.rect(x, y_top - h_table_h, width, h_table_h)
        
        # Horizontal divider inside header
        y_mid = y_top - 18
        self.line(x, y_mid, x + col_w[0] + col_w[1], y_mid)
        
        # Vertical divider 1
        self.line(x + col_w[0], y_mid, x + col_w[0], y_top - h_table_h)
        
        # Vertical divider 2 (right logo box)
        self.line(x + col_w[0] + col_w[1], y_top, x + col_w[0] + col_w[1], y_top - h_table_h)

        # Text in top-left
        self.setFont("Times-Bold", 10.5)
        self.drawString(x + 6, y_top - 13, "Health, Safety and Environmental Management System")

        # Text in sub-left
        self.setFont("Times-Roman", 7.5)
        self.drawString(x + 5, y_mid - 8, "Attachment 10.1D")
        self.drawString(x + 5, y_mid - 16, "HSEMS Rev No: 00")
        self.drawString(x + 5, y_mid - 24, "25th January 2018")

        # Center title
        self.setFont("Times-Bold", 13)
        self.drawCentredString(x + col_w[0] + (col_w[1] / 2), y_mid - 18, "REQUISITION FORM")

        # Logo on right
        if self.logo_path and os.path.exists(self.logo_path):
            try:
                logo_w = col_w[2] - 12
                logo_h = h_table_h - 8
                self.drawImage(self.logo_path, x + col_w[0] + col_w[1] + 6, y_top - h_table_h + 4, width=logo_w, height=logo_h, preserveAspectRatio=True, anchor='c')
            except Exception:
                pass


def decode_base64_image(b64_str):
    """Decodes data:image/...;base64,... into a temp file."""
    if not b64_str or not isinstance(b64_str, str) or 'base64,' not in b64_str:
        return None
    try:
        header, encoded = b64_str.split('base64,', 1)
        ext = '.png'
        if 'jpeg' in header or 'jpg' in header:
            ext = '.jpg'
        data = base64.b64decode(encoded)
        tmp = tempfile.NamedTemporaryFile(delete=False, suffix=ext)
        tmp.write(data)
        tmp.close()
        return tmp.name
    except Exception:
        return None


def build_page1_header_table(logo_path, printable_width):
    """Builds authentic top HSEMS header table for Page 1."""
    c_w = printable_width
    col_w = [c_w * 0.28, c_w * 0.48, c_w * 0.24]
    
    logo_flowable = None
    if logo_path and os.path.exists(logo_path):
        try:
            logo_flowable = RLImage(logo_path, width=col_w[2] - 10, height=36, kind='proportional')
        except Exception:
            logo_flowable = Paragraph("<b>AB MALAYA MARINE</b>", ParagraphStyle('LogoFallback', fontName='Helvetica-Bold', fontSize=8, alignment=1))
    else:
        logo_flowable = Paragraph("<b>AB MALAYA MARINE</b>", ParagraphStyle('LogoFallback', fontName='Helvetica-Bold', fontSize=8, alignment=1))

    title_style = ParagraphStyle(
        'HeaderTitle',
        fontName='Times-Bold',
        fontSize=12,
        leading=14,
        textColor=colors.black
    )
    
    att_style = ParagraphStyle(
        'HeaderAtt',
        fontName='Times-Roman',
        fontSize=8,
        leading=10,
        textColor=colors.black
    )
    
    req_style = ParagraphStyle(
        'HeaderReq',
        fontName='Times-Bold',
        fontSize=14,
        leading=16,
        alignment=1,
        textColor=colors.black
    )

    data = [
        [
            Paragraph("Health, Safety and Environmental Management System", title_style),
            "",
            logo_flowable
        ],
        [
            Paragraph("Attachment 10.1D<br/>HSEMS Rev No: 00<br/>25th January 2018", att_style),
            Paragraph("REQUISITION FORM", req_style),
            ""
        ]
    ]

    t = Table(data, colWidths=col_w)
    t.setStyle(TableStyle([
        ('SPAN', (0, 0), (1, 0)),
        ('SPAN', (2, 0), (2, 1)),
        ('BOX', (0, 0), (-1, -1), 1, colors.black),
        ('INNERGRID', (0, 0), (-1, -1), 1, colors.black),
        ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
        ('ALIGN', (2, 0), (2, 1), 'CENTER'),
        ('TOPPADDING', (0, 0), (-1, -1), 4),
        ('BOTTOMPADDING', (0, 0), (-1, -1), 4),
        ('LEFTPADDING', (0, 0), (-1, -1), 6),
        ('RIGHTPADDING', (0, 0), (-1, -1), 6),
    ]))
    return t


def sanitize_confidential_info(item):
    """Recursively redacts and sanitizes any sensitive client/operator identifiers (e.g. dutamarine)."""
    if isinstance(item, dict):
        return {k: sanitize_confidential_info(v) for k, v in item.items()}
    elif isinstance(item, list):
        return [sanitize_confidential_info(x) for x in item]
    elif isinstance(item, str):
        import re
        if 'dutamarine' in item.lower() or 'duta marine' in item.lower() or 'duta pacific' in item.lower():
            if '@' in item:
                return ''
            item = re.sub(r'dutamarine(\.com)?', 'abmalaya.com', item, flags=re.IGNORECASE)
            item = re.sub(r'duta\s*marine', 'AB Malaya Marine', item, flags=re.IGNORECASE)
            item = re.sub(r'duta\s*pacific', 'ABM Pacific', item, flags=re.IGNORECASE)
        return item
    return item


def generate_requisition_pdf(data, output_pdf_path):
    """Generates the official PDF matching HSEMS Attachment 10.1D."""
    temp_files = []

    try:
        data = sanitize_confidential_info(data)
        margin = 36 # 0.5 inch / 12.7 mm
        page_w, page_h = A4
        printable_w = page_w - (margin * 2)

        # Handle custom logo
        logo_path = None
        if data.get('custom_logo_base64'):
            tmp_logo = decode_base64_image(data['custom_logo_base64'])
            if tmp_logo:
                temp_files.append(tmp_logo)
                logo_path = tmp_logo
        if not logo_path:
            def_logo = '/root/abmlaya/assets/img/logo-abmalaya.webp'
            if os.path.exists(def_logo):
                logo_path = def_logo

        # Handle custom stamp / signature
        stamp_path = None
        if data.get('custom_stamp_base64'):
            tmp_stamp = decode_base64_image(data['custom_stamp_base64'])
            if tmp_stamp:
                temp_files.append(tmp_stamp)
                stamp_path = tmp_stamp

        # Handle signature (manual canvas stroke or uploaded image)
        sig_path = None
        if data.get('signature_base64'):
            tmp_sig = decode_base64_image(data['signature_base64'])
            if tmp_sig:
                temp_files.append(tmp_sig)
                sig_path = tmp_sig

        # BaseDocTemplate with 2 page templates to allow repeating header on Page 2+
        doc = BaseDocTemplate(
            output_pdf_path,
            pagesize=A4,
            leftMargin=margin,
            rightMargin=margin,
            topMargin=margin,
            bottomMargin=42
        )

        # Frame 1 for Page 1: starts below margin 36
        frame_page1 = Frame(
            margin, 42, printable_w, page_h - margin - 42,
            id='F_Page1', topPadding=0, bottomPadding=0, leftPadding=0, rightPadding=0
        )
        # Frame 2 for Pages 2+: top padding 56 to allow space for repeating canvas header
        frame_later = Frame(
            margin, 42, printable_w, page_h - 92 - 42,
            id='F_Later', topPadding=0, bottomPadding=0, leftPadding=0, rightPadding=0
        )

        template_page1 = PageTemplate(id='T_Page1', frames=frame_page1)
        template_later = PageTemplate(id='T_Later', frames=frame_later)
        doc.addPageTemplates([template_page1, template_later])

        style_normal = ParagraphStyle('ItemNormal', fontName='Times-Roman', fontSize=8.5, leading=10.5)
        style_bold = ParagraphStyle('ItemBold', fontName='Times-Bold', fontSize=8.5, leading=10.5)
        style_qty = ParagraphStyle('ItemQty', fontName='Times-Bold', fontSize=8.5, leading=10.5, alignment=1)
        style_num = ParagraphStyle('ItemNum', fontName='Times-Bold', fontSize=8.5, leading=10.5, alignment=1)

        story = []

        # 1. Page 1 Header Table
        story.append(build_page1_header_table(logo_path, printable_w))
        story.append(Spacer(1, 4))

        # 2. Criticality Line
        crit_status = (data.get('critical_status') or '').strip().lower()
        if crit_status == 'critical':
            crit_char, noncrit_char = "[X]", "[  ]"
        elif crit_status == 'non-critical':
            crit_char, noncrit_char = "[  ]", "[X]"
        else:
            crit_char, noncrit_char = "[  ]", "[  ]"

        crit_style = ParagraphStyle(
            'CritLine',
            fontName='Times-Roman',
            fontSize=8.5,
            alignment=2, # Right
            textColor=colors.black
        )
        crit_text = f"{crit_char} Critical Equipment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {noncrit_char} Non-Critical Equipment"
        story.append(Paragraph(crit_text, crit_style))
        story.append(Spacer(1, 4))

        # 3. Metadata Table
        vessel_name = str(data.get('vessel_name') or '').strip().upper()
        req_no = str(data.get('req_no') or '').strip().upper()
        dept = str(data.get('from_dept') or '').strip().lower()
        from_deck_char = "[X]" if dept == 'deck' else "[  ]"
        from_eng_char = "[X]" if dept == 'engine' else "[  ]"

        issue_to = data.get('issue_to', {})
        if isinstance(issue_to, list):
            issue_list = [str(x).lower() for x in issue_to]
            op_char = "[X]" if any('op' in x for x in issue_list) else "[  ]"
            tech_char = "[X]" if any('tech' in x for x in issue_list) else "[  ]"
            man_char = "[X]" if any('man' in x for x in issue_list) else "[  ]"
        elif isinstance(issue_to, dict):
            op_char = "[X]" if issue_to.get('op') else "[  ]"
            tech_char = "[X]" if issue_to.get('tech') else "[  ]"
            man_char = "[X]" if issue_to.get('man') else "[  ]"
        else:
            op_char, tech_char, man_char = "[  ]", "[  ]", "[  ]"

        req_date = str(data.get('date') or '').strip().upper()
        ordering_item = str(data.get('ordering_item') or '').strip().upper()

        meta_col_w = [printable_w * 0.14, printable_w * 0.44, printable_w * 0.42]

        vessel_display = f"<b>{vessel_name}</b>" if vessel_name else "&nbsp;"
        req_no_display = f"<b>Requisition No: {req_no}</b>" if req_no else "<b>Requisition No:</b>"

        meta_data = [
            [
                Paragraph("<b>Vessel</b>", style_normal),
                Paragraph(vessel_display, style_bold),
                Paragraph(req_no_display, style_bold)
            ],
            [
                Paragraph("<b>From</b>", style_normal),
                Paragraph(f"{from_deck_char} Deck Department &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {from_eng_char} Engine Department", style_normal),
                ""
            ],
            [
                Paragraph("<b>Issue to</b>", style_normal),
                Paragraph(f"{op_char} Operation Department &nbsp;&nbsp;&nbsp;&nbsp; {tech_char} Technical Department &nbsp;&nbsp;&nbsp;&nbsp; {man_char} Manning Department", style_normal),
                ""
            ],
            [
                Paragraph("<b>Date</b>", style_normal),
                Paragraph(f"<b>{req_date}</b>", style_bold),
                ""
            ],
            [
                Paragraph("<b>Name of ordering item:</b>", style_normal),
                Paragraph(f"<b>{ordering_item}</b>", style_bold),
                ""
            ]
        ]

        meta_table = Table(meta_data, colWidths=meta_col_w)
        meta_table.setStyle(TableStyle([
            ('SPAN', (1, 1), (2, 1)),
            ('SPAN', (1, 2), (2, 2)),
            ('SPAN', (1, 3), (2, 3)),
            ('SPAN', (1, 4), (2, 4)),
            ('BOX', (0, 0), (-1, -1), 1, colors.black),
            ('INNERGRID', (0, 0), (-1, -1), 1, colors.black),
            ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
            ('TOPPADDING', (0, 0), (-1, -1), 3),
            ('BOTTOMPADDING', (0, 0), (-1, -1), 3),
            ('LEFTPADDING', (0, 0), (-1, -1), 6),
            ('RIGHTPADDING', (0, 0), (-1, -1), 6),
        ]))
        story.append(meta_table)
        story.append(Spacer(1, 6))

        # Switch to later pages template for subsequent items
        from reportlab.platypus import NextPageTemplate
        story.append(NextPageTemplate('T_Later'))

        # 4. Line Items Table
        items = data.get('items', [])
        table_col_w = [printable_w * 0.10, printable_w * 0.74, printable_w * 0.16]

        table_rows = [
            [
                Paragraph("<b>NUMBER</b>", style_num),
                Paragraph("<b>DESCRIPTION</b>", style_bold),
                Paragraph("<b>QUANTITY</b>", style_qty)
            ]
        ]

        if not items:
            for blank_idx in range(1, 6):
                table_rows.append([
                    Paragraph(f"<b>{blank_idx}</b>", style_num),
                    Paragraph("&nbsp;<br/>&nbsp;", style_normal),
                    Paragraph("&nbsp;", style_qty)
                ])
        else:
            for idx, it in enumerate(items):
                item_no = str(it.get('item_no') or (idx + 1))
                name = (it.get('name') or it.get('product_name') or 'Marine Item').upper()
                impa = it.get('impa_code') or '-'
                specs = it.get('specs') or it.get('specification') or ''
                purpose = it.get('purpose') or ''
                qty = f"{it.get('qty') or it.get('quantity') or 1} {it.get('unit') or 'PCS'}"

                desc_parts = [f"<b>{name}</b>"]
                if impa and impa != '-':
                    desc_parts.append(f"IMPA CODE: {impa}")
                if specs:
                    clean_specs = specs.replace('\n', '<br/>')
                    desc_parts.append(clean_specs)
                if purpose:
                    desc_parts.append(f"PURPOSE : {purpose.upper()}")

                desc_flowables = [Paragraph("<br/>".join(desc_parts), style_normal)]

                # Item Photos (Supports up to 2 Full-Width High-Res Photos without Distortion)
                photo1_b64 = it.get('photo_url') or it.get('photo_1')
                photo2_b64 = it.get('photo_url_2') or it.get('photo_2')
                photos_list = it.get('photos', [])
                if not photo1_b64 and len(photos_list) > 0:
                    photo1_b64 = photos_list[0]
                if not photo2_b64 and len(photos_list) > 1:
                    photo2_b64 = photos_list[1]

                tmp_p1 = decode_base64_image(photo1_b64) if photo1_b64 else None
                tmp_p2 = decode_base64_image(photo2_b64) if photo2_b64 else None
                if tmp_p1: temp_files.append(tmp_p1)
                if tmp_p2: temp_files.append(tmp_p2)

                desc_col_inner_w = table_col_w[1] - 14

                if tmp_p1 and tmp_p2:
                    # 2 photos: divide full-width into 2 equal halves, large and proportional (tidak penyot)
                    half_w = (desc_col_inner_w - 6) / 2.0
                    try:
                        img1 = RLImage(tmp_p1, width=half_w, height=140, kind='proportional')
                        img2 = RLImage(tmp_p2, width=half_w, height=140, kind='proportional')
                        photo_t = Table([[img1, img2]], colWidths=[half_w, half_w])
                        photo_t.setStyle(TableStyle([
                            ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
                            ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
                            ('LEFTPADDING', (0, 0), (-1, -1), 2),
                            ('RIGHTPADDING', (0, 0), (-1, -1), 2),
                            ('TOPPADDING', (0, 0), (-1, -1), 3),
                            ('BOTTOMPADDING', (0, 0), (-1, -1), 3),
                            ('BOX', (0, 0), (0, 0), 0.5, colors.black),
                            ('BOX', (1, 0), (1, 0), 0.5, colors.black),
                        ]))
                        desc_flowables.append(Spacer(1, 4))
                        desc_flowables.append(photo_t)
                    except Exception:
                        pass
                elif tmp_p1 or tmp_p2:
                    # 1 photo: fills full-width in photo 1 position, large, proportional (tidak penyot)
                    single_tmp = tmp_p1 or tmp_p2
                    try:
                        img1 = RLImage(single_tmp, width=desc_col_inner_w, height=180, kind='proportional')
                        photo_t = Table([[img1]], colWidths=[desc_col_inner_w])
                        photo_t.setStyle(TableStyle([
                            ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
                            ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
                            ('LEFTPADDING', (0, 0), (-1, -1), 2),
                            ('RIGHTPADDING', (0, 0), (-1, -1), 2),
                            ('TOPPADDING', (0, 0), (-1, -1), 3),
                            ('BOTTOMPADDING', (0, 0), (-1, -1), 3),
                            ('BOX', (0, 0), (-1, -1), 0.5, colors.black),
                        ]))
                        desc_flowables.append(Spacer(1, 4))
                        desc_flowables.append(photo_t)
                    except Exception:
                        pass

                table_rows.append([
                    Paragraph(f"<b>{item_no}</b>", style_num),
                    desc_flowables,
                    Paragraph(f"<b>{qty}</b>", style_qty)
                ])

        items_table = Table(table_rows, colWidths=table_col_w, repeatRows=1)
        items_table.setStyle(TableStyle([
            ('BOX', (0, 0), (-1, -1), 1, colors.black),
            ('INNERGRID', (0, 0), (-1, -1), 1, colors.black),
            ('VALIGN', (0, 0), (-1, -1), 'TOP'),
            ('ALIGN', (0, 0), (0, -1), 'CENTER'),
            ('ALIGN', (2, 0), (2, -1), 'CENTER'),
            ('TOPPADDING', (0, 0), (-1, -1), 4),
            ('BOTTOMPADDING', (0, 0), (-1, -1), 4),
            ('LEFTPADDING', (0, 0), (-1, -1), 6),
            ('RIGHTPADDING', (0, 0), (-1, -1), 6),
        ]))
        story.append(items_table)
        story.append(Spacer(1, 8))

        # 5. Sign-off and Notes Block
        sign_story = []

        master_name = str(data.get('master_name') or '').strip()
        sign_date = str(data.get('sign_date') or req_date or '').strip().upper()

        sign_col_w = [printable_w * 0.40, printable_w * 0.387, printable_w * 0.213]
        sig_box_w = sign_col_w[1] - 12

        has_custom_stamp = stamp_path and os.path.exists(stamp_path)
        has_sig = sig_path and os.path.exists(sig_path)

        stamp_el = None
        if has_custom_stamp:
            try:
                stamp_el = RLImage(stamp_path, width=sig_box_w, height=44, kind='proportional')
            except Exception:
                stamp_el = Paragraph("<b>[ OFFICIAL SHIP STAMP ]</b>", style_bold)

        sig_el = None
        if has_sig:
            try:
                sig_el = RLImage(sig_path, width=sig_box_w, height=36, kind='proportional')
            except Exception:
                sig_el = Paragraph("<i>[ Signature ]</i>", style_normal)

        sig_header_p = Paragraph("<b>Signature / Stamp:</b>", ParagraphStyle('SigHeader', fontName='Times-Bold', fontSize=8.5, leading=10.5))
        stamp_flowables = [sig_header_p]

        if sig_el and stamp_el:
            # STRICT REQUIREMENT: Atas-bawah (Signature on top, Stamp strictly BELOW signature, NOT side-by-side)
            nested_t = Table([[sig_el], [stamp_el]], colWidths=[sig_box_w])
            nested_t.setStyle(TableStyle([
                ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'),
                ('ALIGN', (0, 0), (-1, -1), 'CENTER'),
                ('LEFTPADDING', (0, 0), (-1, -1), 0),
                ('RIGHTPADDING', (0, 0), (-1, -1), 0),
                ('TOPPADDING', (0, 0), (-1, -1), 2),
                ('BOTTOMPADDING', (0, 0), (-1, -1), 2),
            ]))
            stamp_flowables.append(Spacer(1, 2))
            stamp_flowables.append(nested_t)
        elif sig_el:
            stamp_flowables.append(Spacer(1, 6))
            stamp_flowables.append(sig_el)
        elif stamp_el:
            stamp_flowables.append(Spacer(1, 6))
            stamp_flowables.append(stamp_el)
        else:
            stamp_flowables.append(Spacer(1, 14))
            stamp_flowables.append(Paragraph("<i>[ Signature / Stamp ]</i>", ParagraphStyle('NoSign', fontName='Times-Italic', fontSize=7.5, leading=9, alignment=1, textColor=colors.gray)))

        sign_data = [
            [
                Paragraph(f"<b>Master name:</b> {master_name if master_name else '&nbsp;'}", style_normal),
                stamp_flowables,
                Paragraph(f"<b>Date:</b> {sign_date if sign_date else '&nbsp;'}", style_normal)
            ]
        ]

        sign_table = Table(sign_data, colWidths=sign_col_w, rowHeights=[100])
        sign_table.setStyle(TableStyle([
            ('BOX', (0, 0), (-1, -1), 1, colors.black),
            ('INNERGRID', (0, 0), (-1, -1), 1, colors.black),
            ('VALIGN', (0, 0), (0, 0), 'MIDDLE'),  # Master name middle aligned
            ('VALIGN', (1, 0), (1, 0), 'TOP'),     # Signature / Stamp top aligned
            ('VALIGN', (2, 0), (2, 0), 'MIDDLE'),  # Date middle aligned
            ('TOPPADDING', (0, 0), (-1, -1), 4),
            ('BOTTOMPADDING', (0, 0), (-1, -1), 4),
            ('LEFTPADDING', (0, 0), (-1, -1), 6),
            ('RIGHTPADDING', (0, 0), (-1, -1), 6),
        ]))
        sign_story.append(sign_table)
        sign_story.append(Spacer(1, 6))

        # Dynamic Notes Footnote (Empty by default, updates dynamically based on routing_email)
        routing_email = str(data.get('routing_email') or '').strip()
        if routing_email:
            send_to_target = f"Send to {routing_email} and file copy onboard"
        else:
            send_to_target = "Send to ________________________ and file copy onboard"

        note_text = (
            f"Note: 1. {send_to_target}<br/>"
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. * Format for report no: Vessel Code/RF/Year/ Running no of that year, (example Vessel Code/DK/2026/001)."
        )
        sign_story.append(Paragraph(note_text, ParagraphStyle('Notes', fontName='Times-Roman', fontSize=7.5, leading=9.5)))

        story.append(KeepTogether(sign_story))

        # Build Document using custom NumberedCanvas with Logo
        def canvas_maker(*args, **kwargs):
            return MaritimeNumberedCanvas(*args, logo_path=logo_path, **kwargs)

        doc.build(story, canvasmaker=canvas_maker)
        return True

    finally:
        for f in temp_files:
            try:
                if os.path.exists(f):
                    os.unlink(f)
            except Exception:
                pass


if __name__ == '__main__':
    if len(sys.argv) < 3:
        print("Usage: python3 pdf_engine.py <input_json_path_or_stdin> <output_pdf_path>")
        sys.exit(1)

    in_param = sys.argv[1]
    out_param = sys.argv[2]

    if in_param == '-':
        json_data = json.loads(sys.stdin.read())
    else:
        with open(in_param, 'r', encoding='utf-8') as f:
            json_data = json.load(f)

    generate_requisition_pdf(json_data, out_param)
    print(f"PDF successfully generated at: {out_param}")
