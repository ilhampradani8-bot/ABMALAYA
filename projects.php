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

    .four_zero_four_bg {
        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
        background-repeat: no-repeat;
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
        .four_zero_four_bg {
            height: 300px;
            background-size: contain;
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
                    <div class="four_zero_four_bg"></div>
                    
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
