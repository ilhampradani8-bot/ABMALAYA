<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Receipt That Got Personal — The Quiet Cup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gloock&family=Nunito+Sans:ital,opsz,wght@0,6..12,400..700;1,6..12,400..700&family=Caveat:wght@600&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
      :root {
        --bg-color: #f7f3ee;
        --text-primary: #1c1917;
        --text-muted: #78716c;
        --printer-casing: #292524;
        --printer-top: #3c3836;
        --printer-slot: #0c0a09;
        --accent-green: #10b981;
        --accent-blue: #0284c7;
        --feed: 0;
      }

      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        background-color: var(--bg-color);
        color: var(--text-primary);
        font-family: 'Nunito Sans', sans-serif;
        line-height: 1.5;
        min-height: 100vh;
        overflow-x: hidden;
      }

      /* Masthead */
      .masthead {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 64px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 32px;
        background: rgba(247, 243, 238, 0.92);
        backdrop-filter: blur(8px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        z-index: 100;
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
        color: var(--text-primary);
        font-family: 'Gloock', serif;
        font-size: 1.15rem;
        letter-spacing: 1px;
      }

      .brand svg {
        width: 28px;
        height: 28px;
      }

      .masthead-note {
        font-size: 0.75rem;
        letter-spacing: 1.5px;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
      }

      /* Main Experience Grid */
      .experience {
        display: grid;
        grid-template-columns: 1fr 1fr;
        max-width: 1200px;
        margin: 80px auto 0 auto;
        padding: 40px 24px 180px 24px;
        gap: 48px;
        min-height: calc(100vh - 80px);
      }

      /* Left Section: Intro */
      .intro {
        position: sticky;
        top: 100px;
        height: fit-content;
        padding: 24px 0;
      }

      .edition {
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        letter-spacing: 2px;
        color: #b45309;
        font-weight: 700;
        margin-bottom: 16px;
      }

      .intro h1 {
        font-family: 'Gloock', serif;
        font-size: 3.8rem;
        line-height: 1.1;
        letter-spacing: -0.5px;
        margin-bottom: 24px;
        color: #0c0a09;
      }

      .intro h1 span {
        font-style: italic;
        color: #b45309;
      }

      .intro p {
        font-size: 1.15rem;
        color: #44403c;
        margin-bottom: 16px;
      }

      .intro p.handwritten {
        font-family: 'Caveat', cursive;
        font-size: 2rem;
        color: #b45309;
        transform: rotate(-2deg);
        margin-top: 10px;
      }

      .scroll-guide {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 48px;
        padding: 16px 20px;
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e7e5e4;
        width: fit-content;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
      }

      .scroll-arrow {
        font-size: 1.4rem;
        color: #b45309;
        animation: arrow-bounce 1.5s infinite;
      }

      @keyframes arrow-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(5px); }
      }

      .scroll-guide strong {
        display: block;
        font-size: 0.85rem;
        letter-spacing: 1px;
      }

      .scroll-guide span {
        font-size: 0.8rem;
        color: var(--text-muted);
      }

      /* Right Section: The Receipt */
      .receipt-column {
        display: flex;
        justify-content: center;
        padding-bottom: 260px; /* Provides space for receipt to scroll past the slot */
      }

      .receipt {
        background: #ffffff;
        width: 100%;
        max-width: 420px;
        padding: 40px 32px 60px 32px;
        box-shadow: 
          0 10px 30px -5px rgba(0, 0, 0, 0.08),
          0 20px 25px -5px rgba(0, 0, 0, 0.04),
          0 0 0 1px rgba(0, 0, 0, 0.05);
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        position: relative;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.04));
      }

      /* Jagged Receipt Paper Edge Top & Bottom */
      .receipt::before {
        content: '';
        position: absolute;
        top: -8px;
        left: 0;
        right: 0;
        height: 8px;
        background: radial-gradient(circle, transparent, transparent 50%, #ffffff 50%, #ffffff 100%);
        background-size: 16px 16px;
      }

      .receipt-header {
        text-align: center;
        border-bottom: 2px dashed #e7e5e4;
        padding-bottom: 20px;
        margin-bottom: 20px;
      }

      .receipt-cup {
        width: 44px;
        height: 38px;
        margin-bottom: 12px;
      }

      .receipt-header h2 {
        font-family: 'Gloock', serif;
        font-size: 1.6rem;
        letter-spacing: 1px;
        margin-bottom: 4px;
      }

      .receipt-header p {
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: var(--text-muted);
      }

      .receipt-address {
        font-style: italic;
        margin: 6px 0 16px 0;
        color: #78716c;
      }

      .receipt-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: #57534e;
        line-height: 1.6;
      }

      .receipt-columns {
        display: flex;
        justify-content: space-between;
        font-weight: 700;
        font-size: 0.78rem;
        border-bottom: 1px solid #1c1917;
        padding-bottom: 6px;
        margin-bottom: 16px;
        letter-spacing: 0.5px;
      }

      .receipt-items {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 24px;
      }

      .receipt-line {
        display: grid;
        grid-template-columns: 24px 1fr auto;
        gap: 12px;
        align-items: flex-start;
        line-height: 1.4;
      }

      .receipt-line .quantity {
        font-weight: 700;
      }

      .receipt-line small {
        display: block;
        font-size: 0.75rem;
        color: #78716c;
        margin-top: 2px;
      }

      .receipt-line--personal {
        color: #9a3412;
      }

      .receipt-line .amount {
        text-align: right;
        font-variant-numeric: tabular-nums;
      }

      .receipt-totals {
        border-top: 1px dashed #d6d3d1;
        border-bottom: 2px solid #1c1917;
        padding: 16px 0;
        margin-bottom: 24px;
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .receipt-totals div {
        display: flex;
        justify-content: space-between;
        font-weight: 700;
      }

      .receipt-closing {
        text-align: center;
        padding-top: 12px;
      }

      .stamp {
        display: inline-block;
        border: 2px solid #b91c1c;
        color: #b91c1c;
        padding: 4px 16px;
        font-weight: 700;
        letter-spacing: 2px;
        transform: rotate(-6deg);
        margin-bottom: 16px;
        border-radius: 4px;
      }

      .receipt-closing p {
        font-size: 0.8rem;
        color: #57534e;
        line-height: 1.5;
        margin-bottom: 16px;
      }

      .barcode {
        width: 100%;
        height: 48px;
        background: repeating-linear-gradient(
          to right,
          #1c1917 0,
          #1c1917 2px,
          transparent 2px,
          transparent 5px,
          #1c1917 5px,
          #1c1917 6px,
          transparent 6px,
          transparent 9px,
          #1c1917 9px,
          #1c1917 12px,
          transparent 12px,
          transparent 14px
        );
        margin-bottom: 16px;
      }

      .receipt-balance {
        font-size: 0.85rem;
        font-weight: 700;
      }

      /* ═══════════════════════════════════════════════════════════════
         PRINTER DOCK & PRINTER BODY
         ═══════════════════════════════════════════════════════════════ */
      .printer-dock {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 80;
        pointer-events: none;
      }

      .printer {
        pointer-events: auto;
        width: 100%;
        max-width: 480px;
        background: var(--printer-casing);
        border-radius: 16px 16px 0 0;
        border: 1px solid #44403c;
        border-bottom: none;
        box-shadow: 
          0 -10px 40px rgba(0, 0, 0, 0.4),
          0 -2px 10px rgba(255, 255, 255, 0.05);
        transition: transform 0.05s linear;
      }

      @keyframes printer-shake {
        0% { transform: translateY(0); }
        25% { transform: translateY(-1px) translateX(0.5px); }
        50% { transform: translateY(0.5px) translateX(-0.5px); }
        75% { transform: translateY(-0.5px); }
        100% { transform: translateY(0); }
      }

      .printer.is-printing {
        animation: printer-shake 0.08s infinite ease-in-out;
      }

      .printer-top {
        height: 48px;
        background: linear-gradient(180deg, #44403c 0%, #292524 100%);
        border-radius: 15px 15px 0 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 24px;
        box-shadow: inset 0 2px 2px rgba(255, 255, 255, 0.15), inset 0 -4px 6px rgba(0, 0, 0, 0.4);
        border-bottom: 1px solid #1c1917;
      }

      .printer-slot {
        display: block;
        width: 100%;
        max-width: 430px;
        height: 8px;
        background: var(--printer-slot);
        border-radius: 4px;
        box-shadow: 
          inset 0 2px 4px #000000,
          0 1px 0 rgba(255, 255, 255, 0.12);
        position: relative;
      }

      .printer-slot::before {
        content: '';
        position: absolute;
        top: -1px;
        left: 4px;
        right: 4px;
        height: 1px;
        background: #78716c;
        opacity: 0.6;
      }

      .printer-face {
        height: 64px;
        background: linear-gradient(180deg, #292524 0%, #1c1917 100%);
        padding: 12px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
      }

      .printer-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #0c0a09;
        border: 1px solid #44403c;
        padding: 6px 12px;
        border-radius: 4px;
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #38bdf8;
        text-shadow: 0 0 6px rgba(56, 189, 248, 0.5);
      }

      .status-light {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--accent-green);
        box-shadow: 0 0 8px var(--accent-green);
        display: inline-block;
      }

      .printer.is-printing .status-light {
        animation: pulse-light 0.15s infinite alternate;
      }

      @keyframes pulse-light {
        0% { background: #38bdf8; box-shadow: 0 0 10px #38bdf8; }
        100% { background: #0284c7; box-shadow: 0 0 2px #0284c7; }
      }

      .printer-model {
        font-family: 'Space Mono', monospace;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        color: #a8a29e;
        text-transform: uppercase;
        background: rgba(255, 255, 255, 0.05);
        padding: 3px 6px;
        border-radius: 3px;
      }

      .printer-vents {
        display: flex;
        gap: 4px;
        align-items: center;
      }

      .printer-vents i {
        display: block;
        width: 3px;
        height: 16px;
        background: #0c0a09;
        border-radius: 1.5px;
        box-shadow: inset 0 1px 1px #000, 1px 0 0 rgba(255, 255, 255, 0.05);
      }

      .printer-brand {
        font-family: 'Gloock', serif;
        font-size: 10px;
        letter-spacing: 0.5px;
        color: #78716c;
        text-transform: lowercase;
      }

      .printer-caption {
        pointer-events: auto;
        width: 100%;
        max-width: 480px;
        background: #0c0a09;
        color: #78716c;
        font-family: 'Space Mono', monospace;
        font-size: 9px;
        letter-spacing: 1px;
        text-align: center;
        padding: 4px 12px;
        border: 1px solid #292524;
        border-top: none;
      }

      /* Page Footer with Controls */
      .page-footer {
        position: fixed;
        bottom: 12px;
        right: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        background: #1c1917;
        color: #f5f5f4;
        padding: 8px 16px;
        border-radius: 30px;
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        z-index: 90;
      }

      .print-count {
        color: #a8a29e;
      }

      .print-count #printed-count {
        color: #38bdf8;
        font-weight: 700;
      }

      #print-again {
        background: transparent;
        border: none;
        color: #f5f5f4;
        font-family: 'Space Mono', monospace;
        font-size: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 4px 8px;
        border-radius: 4px;
        transition: background 0.15s;
      }

      #print-again:hover {
        background: rgba(255, 255, 255, 0.1);
      }

      @media (max-width: 900px) {
        .experience {
          grid-template-columns: 1fr;
        }
        .intro {
          position: static;
        }
        .page-footer {
          bottom: 100px;
          right: 16px;
        }
      }
    </style>
  </head>
  <body>
    <header class="masthead" id="top">
      <a class="brand" href="#top" aria-label="The Quiet Cup, back to top">
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M8 16h21v9a9 9 0 0 1-9 9h-3a9 9 0 0 1-9-9v-9Zm21 2h3a5 5 0 0 1 0 10h-4M5 36h28M14 10c-4-4 4-5 0-9M22 10c-4-4 4-5 0-9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <span>THE QUIET CUP</span>
      </a>
      <span class="masthead-note">COFFEE. CAKE. A LITTLE TOO MUCH THINKING.</span>
    </header>

    <main class="experience">
      <section class="intro" aria-labelledby="page-title">
        <div class="edition">A RECEIPT FOR THE REST OF US</div>
        <h1 id="page-title">Just coffee.<br>And everything<br><span>else.</span></h1>
        <p>You came in for a little pick-me-up.<br>Apparently, you brought a few things with you.</p>
        <p class="handwritten">It's all on your tab.</p>
        <div class="scroll-guide">
          <span class="scroll-arrow" aria-hidden="true">↓</span>
          <div><strong>SCROLL TO PRINT</strong><span>The longer you stay, the more comes out.</span></div>
        </div>
      </section>

      <section class="receipt-column" aria-label="Your café receipt">
        <article class="receipt">
          <header class="receipt-header">
            <svg class="receipt-cup" viewBox="0 0 48 42" fill="none" aria-hidden="true"><path d="M9 15h25v10a11 11 0 0 1-11 11h-3A11 11 0 0 1 9 25V15Zm25 2h3a5 5 0 0 1 0 10h-3M5 39h35M17 10c-4-4 4-5 0-9M25 10c-4-4 4-5 0-9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
            <h2>THE QUIET CUP</h2>
            <p>COFFEE &amp; OTHER FEELINGS</p>
            <p class="receipt-address">Somewhere between fine &amp; tired.</p>
            <div class="receipt-meta"><span>ORDER #0042</span><span>TABLE 04</span></div>
            <div class="receipt-meta"><span>GUEST: YOU</span><span>TIME: A LITTLE LATE</span></div>
          </header>
          <div class="receipt-columns"><span>QTY / DESCRIPTION</span><span>AMOUNT</span></div>
          <div class="receipt-items">
            <div class="receipt-line"><span class="quantity">1</span><span>Flat white<small>Something to wake you up.</small></span><span class="amount">3.50</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Lemon cake<small>Something to make it better.</small></span><span class="amount">4.75</span></div>
            <div class="receipt-line receipt-line--personal"><span class="quantity">1</span><span>Stayed a little longer than you meant to.</span><span class="amount">0.00</span></div>
            <div class="receipt-line"><span class="quantity">3</span><span>Checked phone.<br>No particular reason.</span><span class="amount">0.50</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Rehearsed a conversation that never happened.</span><span class="amount">3.00</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Said “you too” to “enjoy your coffee.”</span><span class="amount">1.25</span></div>
            <div class="receipt-line"><span class="quantity">3</span><span>Read a text in three different tones.</span><span class="amount">2.00</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Remembered something embarrassing from 2014.</span><span class="amount">4.50</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Watched someone leave. Invented their whole life.</span><span class="amount">2.75</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Opened calendar.<br>Closed calendar.</span><span class="amount">1.00</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Called being tired a personality trait.</span><span class="amount">3.50</span></div>
            <div class="receipt-line"><span class="quantity">1</span><span>Held it together, mostly.</span><span class="amount">0.00</span></div>
          </div>
          <div class="receipt-totals">
            <div><span>SUBTOTAL</span><span>26.75</span></div>
            <div><span>OVERTHINKING TAX</span><span>WAIVED</span></div>
            <div><span>HUMAN DISCOUNT</span><span>−26.75</span></div>
          </div>
          <div class="receipt-closing">
            <span class="stamp">ON THE HOUSE</span>
            <p>You've done enough today.<br>Let this one be on us.</p>
            <div class="barcode" aria-hidden="true"></div>
            <p class="receipt-balance">Balance due: one nap.</p>
          </div>
        </article>
      </section>
    </main>

    <div class="printer-dock">
      <div class="printer" role="img" aria-label="Vintage café receipt printer">
        <div class="printer-top"><span class="printer-slot"></span></div>
        <div class="printer-face">
          <div class="printer-label"><span class="status-light"></span><span id="printer-status">READY TO PRINT</span></div>
          <span class="printer-model">QC—42</span>
          <div class="printer-vents" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
          <span class="printer-brand">quiet cup / thermal series</span>
        </div>
      </div>
      <div class="printer-caption"><span>PLEASE KEEP YOUR FEELINGS CLEAR OF THE SLOT.</span></div>
    </div>

    <footer class="page-footer">
      <span class="print-count"><span id="printed-count">02</span> / 12 ITEMS PRINTED</span>
      <button type="button" id="print-again">Print again <span aria-hidden="true">↗</span></button>
    </footer>

    <script>
      const printer = document.querySelector('.printer');
      const receipt = document.querySelector('.receipt');
      const lines = [...document.querySelectorAll('.receipt-line')];
      const balance = document.querySelector('.receipt-balance');
      const count = document.querySelector('#printed-count');
      const status = document.querySelector('#printer-status');
      const slot = document.querySelector('.printer-slot');
      const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
      let framePending = false;
      let idleTimer;

      function updateFeed() {
        const slotTop = slot.getBoundingClientRect().top;
        const printed = lines.filter(line => line.getBoundingClientRect().bottom <= slotTop).length;
        const finished = balance.getBoundingClientRect().bottom <= slotTop;
        count.textContent = String(printed).padStart(2, '0');
        document.documentElement.style.setProperty('--feed', printed / lines.length);
        if (finished) {
          status.textContent = 'TAKE A BREAK';
          printer.classList.remove('is-printing');
        } else if (printer.classList.contains('is-printing')) {
          status.textContent = 'PRINTING YOUR THOUGHTS';
        } else {
          status.textContent = receipt.getBoundingClientRect().top < slotTop ? 'READY TO PRINT' : 'WAITING FOR YOUR ORDER';
        }
        framePending = false;
      }

      window.addEventListener('scroll', () => {
        printer.classList.add('is-printing');
        if (!framePending) {
          framePending = true;
          requestAnimationFrame(updateFeed);
        }
        clearTimeout(idleTimer);
        idleTimer = setTimeout(() => {
          printer.classList.remove('is-printing');
          updateFeed();
        }, 180);
      }, { passive: true });

      window.addEventListener('resize', updateFeed);
      document.querySelector('#print-again').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: reducedMotion.matches ? 'instant' : 'smooth' });
      });

      updateFeed();
      if (document.fonts) document.fonts.ready.then(updateFeed);
    </script>
  </body>
</html>
