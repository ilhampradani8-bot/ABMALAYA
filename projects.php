<?php 
$pageTitle = "Portfolio - AB Malaya";
$currentPage = "projects";
include 'includes/header.php'; 
?>

<!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="assets/css/home.css">

<?php 
$heroTitle = "<span style='color: #1191cc;'>Proven Excellence</span> <br><span style='color: #093863;'>In Every Major Sector.</span>";
$heroSubtitle = "PORTFOLIO";
$heroDesc = "From large-scale industrial constructions to innovative mobility solutions, explore how AB Malaya delivers technical superiority across Malaysia.";
$showButtons = false;
include 'includes/hero_visual.php';
?>

<style>
    .page_404 {
        padding: 100px 0;
        background: #fff;
        font-family: 'Aeonik', sans-serif;
        text-align: center;
    }

    .page_404 img {
        width: 100%;
    }

    .capsule_animation_container {
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .capsule_animation_container svg {
        max-height: 100%;
        max-width: 100%;
        width: 380px;
        height: 380px;
    }
    
    .contant_box_404 {
        margin-top: -20px;
    }
    
    .contant_box_404 i {
        font-size: 2.5rem;
        color: #1191cc;
        margin-bottom: 20px;
        display: inline-block;
        animation: float 3s ease-in-out infinite;
    }

    .contant_box_404 h3 {
        font-family: 'Aeonik', sans-serif;
        font-size: 2.2rem;
        font-weight: 800;
        color: #093863;
        margin-bottom: 15px;
        letter-spacing: -1px;
    }

    .contant_box_404 p {
        font-family: 'Inter', sans-serif;
        font-size: 1.05rem;
        color: #475569;
        max-width: 600px;
        margin: 0 auto 30px;
        line-height: 1.8;
    }

    .link_404 {
        color: #fff !important;
        padding: 14px 35px;
        background: #1191cc;
        margin: 10px 0;
        display: inline-block;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 5px 15px rgba(17, 145, 204, 0.3);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .link_404:hover {
        background: #093863;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(9, 56, 99, 0.4);
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    @media (max-width: 768px) {
        .page_404 {
            padding: 60px 0;
        }
        .capsule_animation_container {
            height: 300px;
        }
        .capsule_animation_container svg {
            width: 280px;
            height: 280px;
        }
        .contant_box_404 h3 {
            font-size: 1.6rem;
        }
        .contant_box_404 p {
            font-size: 0.95rem;
            padding: 0 15px;
        }
    }
</style>

<section class="page_404">
    <div class="container">
        <div class="row">	
            <div class="col-sm-12">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    <div class="capsule_animation_container">
                        <svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#pill_shadow" transform="scale(.9, .3) translate(32 1150)" />
                        <use href="#everything">
                            <animateTransform attributeName="transform" type="rotate" dur="4s" repeatCount="indefinite" calcMode="spline"
                                keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                values="40 256 256; -40 256 256; 40 256 256" />
                        </use>
                        <defs>
                             <g id="everything">
                                <use href="#pill_top" filter="url(#shadowTop)"/>	
                                <use href="#pill_bottom_back"/>	
                                <use href="#pill_bottom" filter="url(#shadowBottom)" stroke="#0d2b45" stroke-width="2"/>	
                                <use href="#bubble1"/>	
                                <use href="#bubble2"/>	
                                <use href="#bubble3"/>	
                                <use href="#bubble4"/>	
                                <use href="#pill_outline" stroke="#0d2b45" stroke-width="10"/>	
                                <use href="#pill_outline" stroke="#ffd4a3" stroke-width="6"/>
                            </g>
                            <path id="pill_outline" stroke-linejoin="round">
                            <animate attributeName="d" dur="2s" repeatCount="indefinite" calcMode="spline"
                                keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                values="M198 152  C198 82 314 82 314 152  L314 358  C314 424 198 424 198 358 L198 152Z;
                                        M198 162  C198 92 314 92 314 162  L314 348  C314 414 198 414 198 348 L198 162Z;
                                        M198 152  C198 82 314 82 314 152  L314 358  C314 424 198 424 198 358 L198 152Z"/>
                            </path>
                            <g id="pill_shadow" filter="url(#labelClip)">
                                <use href="#pill_outline" fill="#8d697a80" y="128"> 
                                    <animateTransform attributeName="transform" type="rotate" dur="4s" repeatCount="indefinite"
                                        values="90 256 384; -270 256 384" additive="sum"/>
                                </use>
                            </g>
                            <path id="pill_bottom" fill="#8d697a">
                            <animate attributeName="d" dur="4s" repeatCount="indefinite" calcMode="linear"
                                keyTimes="0;0.25;0.5;0.75;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1"
                                values="M198 256  C198 256 314 256 314 256  L314 358  C314 420 198 420 198 358 L198 256Z;
                                        M198 256  C198 226 314 226 314 256  L314 348  C314 420 198 420 198 348 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 358  C314 420 198 420 198 358 L198 256Z;
                                        M198 256  C198 286 314 286 314 256  L314 348  C314 420 198 420 198 348 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 358  C314 420 198 420 198 358 L198 256Z"/>
                            </path>
                            <path id="pill_bottom_back" fill="#d08159">
                            <animate attributeName="d" dur="4s" repeatCount="indefinite" calcMode="linear"
                                keyTimes="0;0.25;0.5;0.75;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1"
                                values="M198 256  C198 256 314 256 314 256  L314 358  C314 414 198 414 198 358 L198 256Z;
                                        M198 256  C198 286 314 286 314 256  L314 348  C314 414 198 414 198 348 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 358  C314 414 198 414 198 358 L198 256Z;
                                        M198 256  C198 226 314 226 314 256  L314 348  C314 414 198 414 198 348 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 358  C314 414 198 414 198 358 L198 256Z;"/>
                            </path>
                            <circle id="bubble1" cy="180" r="4" fill="#d08159">
                                <animate attributeName="cx" dur="4s" repeatCount="indefinite" calcMode="spline"
                                    keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                    values="216;266;216"/>
                            </circle>
                            <circle id="bubble2" cy="160" r="6" fill="#d08159">
                                <animate attributeName="cx" dur="4s" repeatCount="indefinite" calcMode="spline"
                                    keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                    values="236;276;236"/>
                            </circle>
                            <circle id="bubble3" cy="140" r="10" fill="#d08159">
                                <animate attributeName="cx" dur="4s" repeatCount="indefinite" calcMode="spline"
                                    keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                    values="226;276;226"/>
                            </circle>
                            <circle id="bubble4" cy="135" r="4" fill="#d08159">
                                <animate attributeName="cx" dur="4s" repeatCount="indefinite" calcMode="spline"
                                    keyTimes="0;0.5;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1"
                                    values="276;236;276"/>
                            </circle>
                            <path id="pill_top" fill="#ffaa5e" stroke-width="2">
                            <animate attributeName="d" dur="4s" repeatCount="indefinite" calcMode="linear"
                                keyTimes="0;0.25;0.5;0.75;1" keySplines="0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1; 0.5 0 0.5 1"
                                values="M198 256  C198 256 314 256 314 256  L314 152  C314 82 198 82 198 152 L198 256Z;
                                        M198 256  C198 226 314 226 314 256  L314 162  C314 92 198 92 198 162 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 152  C314 82 198 82 198 152 L198 256Z;
                                        M198 256  C198 286 314 286 314 256  L314 162  C314 92 198 92 198 162 L198 256Z;
                                        M198 256  C198 256 314 256 314 256  L314 152  C314 82 198 82 198 152 L198 256Z;"/>
                            </path>
                            <filter id="shadowBottom">
                                <feOffset dx="-32" dy="-8"/>
                                <feComposite operator="out" in="SourceGraphic" in2="offset-blur" result="inverse"/>
                                <feFlood flood-color="#0d2b45" result="color"/>
                                <feComposite operator="in" in="color" in2="inverse" result="shadow"/>
                                <feComposite operator="over" in="shadow" in2="SourceGraphic"/>
                            </filter>
                            <filter id="shadowTop">
                                <feOffset dx="-32" dy="4"/>
                                <feComposite operator="out" in="SourceGraphic" in2="offset-blur" result="inverse"/>
                                <feFlood flood-color="#d08159" result="color"/>
                                <feComposite operator="in" in="color" in2="inverse" result="shadow"/>
                                <feComposite operator="over" in="shadow" in2="SourceGraphic"/>
                            </filter>
                        </defs>
                        </svg>
                    </div>
                    
                    <div class="contant_box_404">
                        <i class="fas fa-hard-hat"></i>
                        <h3>Portfolio Will Be Updated Shortly</h3>
                        <p>We are currently updating our project portfolio with the latest milestones and completed works. Please check back soon for new additions.</p>
                        <a href="/" class="link_404">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
<?php include 'includes/footer.php'; ?>
