<!-- HERO -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root { --jumia-orange: #f68b1e; --jumia-bg: #f5f5f5; }
        body { background-color: var(--jumia-bg); padding: 40px 0; }
        
        /* Container dyal la section */
        .products-section {
            background-color: white;
            border-radius: 4px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        /* Card dyal l-produit */
        .product-card {
            border: none;
            border-radius: 4px;
            padding: 10px;
            transition: all 0.3s ease;
            position: relative;
            background: #fff;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .product-card:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transform: translateY(-5px);
            z-index: 2;
        }

        .product-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Bach t-bqa square */
            margin-bottom: 10px;
        }

        .product-img-wrapper img {
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            width: 100%; height: 100%;
            object-fit: contain;
        }

        .discount-tag {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #feefde;
            color: var(--jumia-orange);
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 2px;
            font-weight: bold;
        }

        .product-title {
            font-size: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 40px;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .current-price { font-size: 18px; font-weight: bold; margin-bottom: 0; }
        .old-price { font-size: 13px; color: #75757a; text-decoration: line-through; }
        
        .stars { color: #f6b01e; font-size: 12px; }
        .express-tag { color: #1c4485; font-size: 11px; font-weight: bold; font-style: italic; }

        :root { --jumia-orange: #f68b1e; --jumia-bg: #f5f5f5; }
    body { background-color: var(--jumia-bg); font-family: 'Roboto', sans-serif; }
    .bg-jumia { background-color: var(--jumia-orange) !important; }
    .btn-jumia { background-color: var(--jumia-orange); color: white; border: none; font-weight: bold; }
    .btn-jumia:hover { background-color: #e07b1a; color: white; }
    .nav-search { border-radius: 4px 0 0 4px; border: 1px solid #ced4da; }
    .card-product { border: none; transition: transform 0.2s; cursor: pointer; border-radius: 4px; }
    .card-product:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    .badge-promo { background-color: #feefde; color: var(--jumia-orange); position: absolute; top: 10px; right: 10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="#">E-commerce <span class="text-warning"><i class="bi bi-star-fill"></i></span></a>
        
        <form class="d-flex flex-grow-1 mx-lg-5 my-2 my-lg-0">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input class="form-control border-start-0 nav-search" type="search" placeholder="Chercher un produit, une marque...">
                <button class="btn btn-jumia px-4" type="submit">RECHERCHER</button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto flex-row gap-3">
            <?php
             if(!isset($_SESSION['user'])) :?>
                <li class="nav-item"><a class="nav-link" href="/Auth/login"><i class="bi bi-person me-1"></i> Se connecter</a></li>
            <?php else : ?> 
                <li class="nav-item"><a class="nav-link" href="/Home/index"><i class="bi bi-person me-1"></i> <?= $_SESSION['user']['name'] ?></a></li>
            <?php endif?>    
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-question-circle me-1"></i> Aide</a></li>
            <li class="nav-item">
                <a class="nav-link position-relative" href="/index.php/Cart/index">
                    <i class="bi bi-cart3 fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-jumia">2</span>
                    <span class="ms-1">Panier</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center bg-danger text-white p-2 rounded-top">
        <h6 class="mb-0 fw-bold px-2"><i class="bi bi-lightning-fill"></i> Ventes Flash</h6>
        <a href="#" class="text-white text-decoration-none small fw-bold">VOIR PLUS ></a>
    </div>

    <div class="products-section rounded-bottom">
        <div class="row g-2">
            <?php foreach ($data as $produit) : ?>
             <div class="col-6 col-md-3">
                <a href="/Product/index?id=<?= $produit->getID() ?>" class="product-card">
                    <div class="product-img-wrapper">
                        <span class="discount-tag">-40%</span>
                        <img src= <?= $produit->getImage() ?> alt="iPhone">
                    </div>
                    <div class="product-info">
                        <div class="product-title"><?= $produit->getName() ?></div>
                        <div class="current-price"><?= $produit->getPrice() ?> DH</div>
                        <div class="old-price">14,999 DH</div>
                        <div class="stars mb-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                            <span class="text-muted">(120)</span>
                        </div>
                        <div class="express-tag">JUMIA <span class="text-primary">EXPRESS</span></div>
                    </div>
                </a>
            </div>
            <?php endforeach;?>
            <!-- <div class="col-6 col-md-3">
                <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <span class="discount-tag">-15%</span>
                        <img src="https://m.media-amazon.com/images/I/61S9aVnRZDL._AC_SL1500_.jpg" alt="Airpods">
                    </div>
                    <div class="product-info">
                        <div class="product-title">AirPods Pro (2ème génération) avec Boîtier de Charge MagSafe</div>
                        <div class="current-price">2,400 DH</div>
                        <div class="old-price">2,900 DH</div>
                        <div class="stars mb-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                            <span class="text-muted">(45)</span>
                        </div>
                        <div class="express-tag">JUMIA <span class="text-primary">EXPRESS</span></div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <span class="discount-tag">-20%</span>
                        <img src="https://m.media-amazon.com/images/I/71Zf9uUp+GL._AC_SL1500_.jpg" alt="Watch">
                    </div>
                    <div class="product-info">
                        <div class="product-title">Apple Watch Series 8 [GPS 45mm] Smartwatch</div>
                        <div class="current-price">4,100 DH</div>
                        <div class="old-price">5,200 DH</div>
                        <div class="stars mb-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span class="text-muted">(89)</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-3">
                <a href="#" class="product-card">
                    <div class="product-img-wrapper">
                        <span class="discount-tag">-30%</span>
                        <img src="https://m.media-amazon.com/images/I/61uA27nL3pL._AC_SL1500_.jpg" alt="Macbook">
                    </div>
                    <div class="product-info">
                        <div class="product-title">MacBook Air M2 - 8Go RAM - 256Go SSD - Gris Sidéral</div>
                        <div class="current-price">11,200 DH</div>
                        <div class="old-price">15,000 DH</div>
                        <div class="stars mb-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                            <span class="text-muted">(32)</span>
                        </div>
                        <div class="express-tag">JUMIA <span class="text-primary">EXPRESS</span></div>
                    </div>
                </a>
            </div> -->

        </div>
    </div>
</div> 

</body>
</html>
<!-- FOOTER -->
<footer class="footer text-center">
  © 2026 E-Tech Store
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
