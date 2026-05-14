<?php 
$pageTitle = "Our Services";
$currentPage = "services";
include 'includes/header.php'; 
?>

<section class="hero" style="height: 40vh; background: linear-gradient(rgba(9, 56, 99, 0.8), rgba(9, 56, 99, 0.8)), url('/assets/img/kapal-tanker.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="hero-content">
            <h1 style="font-family: 'Cinzel', serif; letter-spacing: 4px;">Premium Solutions</h1>
            <p style="font-size: 1.1rem; letter-spacing: 1px; opacity: 0.8;">Bespoke Industrial & Maritime Excellence</p>
        </div>
    </div>
</section>

<!-- Advanced Service Accordion -->
<section style="background: #ffffff; padding: 0;">
    <div class="services-wrapper" style="width: 100%;">
        
        <!-- Division 01: Marine -->
        <div class="premium-accordion-item" style="border-bottom: 1px solid #e2e8f0; transition: var(--transition);">
            <div class="accordion-header" style="padding: 4rem 5%; display: flex; justify-content: space-between; align-items: center; cursor: pointer; background: #fff;" onclick="toggleAccordion('marine')">
                <div style="display: flex; align-items: center; gap: 3rem;">
                    <span style="font-family: 'Cinzel', serif; font-size: 1.5rem; color: #cbd5e1; font-weight: 300;">01</span>
                    <h2 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; color: var(--secondary); font-weight: 600; margin: 0; text-transform: uppercase; letter-spacing: -1px;">Maritime & Subsea</h2>
                </div>
                <div class="toggle-icon-wrap" id="marine-icon-wrap" style="font-size: 1.5rem; color: var(--primary); transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            
            <div id="marine-content" class="accordion-body" style="max-height: 0; overflow: hidden; transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1); background: #fcfcfc;">
                <div style="padding: 0 5% 5rem 5%; padding-left: calc(5% + 5rem);">
                    <div style="max-width: 900px;">
                        <p style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 3rem; line-height: 1.8;">
                            Engineered for resilience. We provide critical maintenance, structural integrity solutions, and specialized logistics for the most demanding maritime environments.
                        </p>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Ship Rust Coating</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Marine Logistics & Delivery</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Offshore Crew Management</li>
                            </ul>
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Vessel Repairs & Maintenance</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Fresh Water & Bunkering</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Boiler Chemicals (VECOM)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Division 02: Industrial IT -->
        <div class="premium-accordion-item" style="border-bottom: 1px solid #e2e8f0; transition: var(--transition);">
            <div class="accordion-header" style="padding: 4rem 5%; display: flex; justify-content: space-between; align-items: center; cursor: pointer; background: #fff;" onclick="toggleAccordion('it')">
                <div style="display: flex; align-items: center; gap: 3rem;">
                    <span style="font-family: 'Cinzel', serif; font-size: 1.5rem; color: #cbd5e1; font-weight: 300;">02</span>
                    <h2 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; color: var(--secondary); font-weight: 600; margin: 0; text-transform: uppercase; letter-spacing: -1px;">IT & Digital Infrastructure</h2>
                </div>
                <div class="toggle-icon-wrap" id="it-icon-wrap" style="font-size: 1.5rem; color: var(--primary); transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            
            <div id="it-content" class="accordion-body" style="max-height: 0; overflow: hidden; transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1); background: #fcfcfc;">
                <div style="padding: 0 5% 5rem 5%; padding-left: calc(5% + 5rem);">
                    <div style="max-width: 900px;">
                        <p style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 3rem; line-height: 1.8;">
                            Secure connectivity in the most remote locations. We bridge the gap between heavy industry and digital intelligence through robust IT infrastructure.
                        </p>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Remote Area Networks</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Industrial Hardware Supply</li>
                            </ul>
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Data Diode Security</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Asset Monitoring Systems</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Division 03: Environment -->
        <div class="premium-accordion-item" style="border-bottom: 1px solid #e2e8f0; transition: var(--transition);">
            <div class="accordion-header" style="padding: 4rem 5%; display: flex; justify-content: space-between; align-items: center; cursor: pointer; background: #fff;" onclick="toggleAccordion('env')">
                <div style="display: flex; align-items: center; gap: 3rem;">
                    <span style="font-family: 'Cinzel', serif; font-size: 1.5rem; color: #cbd5e1; font-weight: 300;">03</span>
                    <h2 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; color: var(--secondary); font-weight: 600; margin: 0; text-transform: uppercase; letter-spacing: -1px;">Environment & Energy</h2>
                </div>
                <div class="toggle-icon-wrap" id="env-icon-wrap" style="font-size: 1.5rem; color: var(--primary); transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            
            <div id="env-content" class="accordion-body" style="max-height: 0; overflow: hidden; transition: max-height 0.6s cubic-bezier(0.4, 0, 0.2, 1); background: #fcfcfc;">
                <div style="padding: 0 5% 5rem 5%; padding-left: calc(5% + 5rem);">
                    <div style="max-width: 900px;">
                        <p style="font-size: 1.2rem; color: var(--text-light); margin-bottom: 3rem; line-height: 1.8;">
                            Sustainable operations for a greener tomorrow. We provide environmental compliance and renewable energy investment strategies for industrial growth.
                        </p>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem;">
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Wastewater Management</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Industrial Solar Energy</li>
                            </ul>
                            <ul style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Compliance & HSE Audits</li>
                                <li style="margin-bottom: 1.5rem; font-weight: 600; color: var(--secondary); display: flex; align-items: center; gap: 1rem;"><span style="width: 8px; height: 8px; background: var(--primary); border-radius: 50%;"></span> Energy Transition Consultancy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    @media (max-width: 768px) {
        .accordion-header {
            padding: 2.5rem 5% !important;
            flex-direction: row !important;
            align-items: center !important;
        }
        .accordion-header h2 {
            font-size: 1.4rem !important;
        }
        .accordion-header span {
            font-size: 1rem !important;
            min-width: 30px;
        }
        .accordion-header div {
            gap: 1.5rem !important;
        }
        .accordion-body div {
            padding-left: 5% !important;
        }
        .accordion-body p {
            font-size: 1rem !important;
        }
    }
</style>

<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id + '-content');
        const iconWrap = document.getElementById(id + '-icon-wrap');
        const parent = content.parentElement;

        // Close others
        const allContents = document.querySelectorAll('.accordion-body');
        const allIcons = document.querySelectorAll('.toggle-icon-wrap');
        
        allContents.forEach(c => {
            if (c.id !== id + '-content') {
                c.style.maxHeight = '0';
            }
        });
        allIcons.forEach(i => {
            if (i.id !== id + '-icon-wrap') {
                i.style.transform = 'rotate(0deg)';
                i.querySelector('i').className = 'fas fa-plus';
            }
        });

        if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
            content.style.maxHeight = content.scrollHeight + 'px';
            iconWrap.style.transform = 'rotate(135deg)';
            iconWrap.querySelector('i').className = 'fas fa-plus';
        } else {
            content.style.maxHeight = '0';
            iconWrap.style.transform = 'rotate(0deg)';
            iconWrap.querySelector('i').className = 'fas fa-plus';
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
