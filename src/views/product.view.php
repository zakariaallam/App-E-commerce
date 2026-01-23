<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit | Jumia Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root { --jumia-orange: #f68b1e; --jumia-bg: #f5f5f5; }
        body { background-color: var(--jumia-bg); font-family: 'Roboto', sans-serif; }
        
        .main-card { border: none; border-radius: 4px; background: white; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .product-main-img { width: 100%; max-height: 400px; object-fit: contain; }
        .thumbnail-img { width: 60px; height: 60px; border: 1px solid #ddd; padding: 2px; cursor: pointer; border-radius: 4px; }
        .thumbnail-img:hover { border-color: var(--jumia-orange); }
        
        .price-tag { font-size: 28px; font-weight: bold; color: #313133; }
        .old-price-tag { font-size: 16px; color: #75757a; text-decoration: line-through; }
        .discount-badge { background: #feefde; color: var(--jumia-orange); font-weight: bold; padding: 2px 6px; font-size: 14px; }
        
        .btn-buy { background: var(--jumia-orange); color: white; border: none; padding: 15px; font-weight: bold; font-size: 18px; box-shadow: 0 4px 8px rgba(246, 139, 30, 0.3); }
        .btn-buy:hover { background: #e07b1a; color: white; }
        
        .delivery-box { border: 1px solid #eee; border-radius: 4px; padding: 15px; background: white; }
        .delivery-title { font-size: 12px; font-weight: bold; color: #75757a; text-transform: uppercase; margin-bottom: 10px; }
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
                <a class="nav-link position-relative" href="/Cart/index">
                    <i class="bi bi-cart3 fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-jumia"><?= $_SESSION['cuont'] ?? 0 ?></span>
                    <span class="ms-1">Panier</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container py-4">
    <div class="row g-3">
        
        <div class="col-lg-9">
            <div class="main-card">
                <div class="row">
                    <div class="col-md-5">
                        <!-- <img src="https://via.placeholder.com/400" class="product-main-img mb-3" alt="Produit"> -->
                        <div class="d-flex gap-2">
                            <img src=<?= $produit->getImage() ?> class="thumbnail-img">
                            <!-- <img src="https://via.placeholder.com/60" class="thumbnail-img">
                            <img src="https://via.placeholder.com/60" class="thumbnail-img"> -->
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between">
                            <span class="badge bg-jumia mb-2">Jumia Express</span>
                            <i class="bi bi-heart fs-5 cursor-pointer"></i>
                        </div>
                        <h4 class="fw-normal"><?= $produit->getName() ?></h4>
                        <p class="small text-muted">Marque: <a href="#" class="text-decoration-none text-info">Samsung</a> | Produits similaires de Samsung</p>
                        <p class="small text-muted">Category: <a href="#" class="text-decoration-none text-info"><?= $produit->getCategorie()->getName() ?></a></p>
                        
                        <hr>
                        
                        <div class="price-tag"><?= $produit->getPrice() ?> DH</div>
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <span class="old-price-tag">13,999.00 DH</span>
                            <span class="discount-badge">-18%</span>
                        </div>
                        
                        <p class="text-success small fw-bold"><i class="bi bi-shield-check"></i> Garantie de 12 mois</p>
                        
                        <div class="mt-4">
                            <a href="/Product/sendCart?id=<?= $_GET['id'] ?>" class="card text-decoration-none" ?>
                            <button class="btn btn-buy w-100 mb-2">
                                <i class="bi bi-cart-plus me-2"></i> AJOUTER AU PANIER
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="main-card mt-3">
                <h5 class="border-bottom pb-2">Description</h5>
                <p class="text-muted small"><?= $produit->getDescription() ?></p>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="delivery-box mb-3">
                <div class="delivery-title">LIVRAISON & RETOURS</div>
                <div class="d-flex gap-2 mb-3">
                    <i class="bi bi-truck fs-4 text-muted"></i>
                    <div>
                        <div class="fw-bold small">Livraison Standard</div>
                        <div class="text-muted" style="font-size: 11px;">Prêt pour expédition entre 24h et 48h</div>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    <i class="bi bi-arrow-counterclockwise fs-4 text-muted"></i>
                    <div>
                        <div class="fw-bold small">Politique de retour</div>
                        <div class="text-muted" style="font-size: 11px;">Retour gratuit sous 15 jours pour les articles Jumia Mall</div>
                    </div>
                </div>
            </div>

            <div class="delivery-box">
                <div class="delivery-title">INFORMATIONS SUR LE VENDEUR</div>
                <div class="fw-bold mb-1">Samsung Official Store</div>
                <div class="text-success small mb-2"><i class="bi bi-check-circle-fill"></i> 90% Score de qualité</div>
                <button class="btn btn-outline-warning btn-sm w-100">SUIVRE LE VENDEUR</button>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>