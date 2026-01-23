<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier | Jumia Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root { --jumia-orange: #f68b1e; --jumia-bg: #f5f5f5; }
        body { background-color: var(--jumia-bg); font-family: 'Roboto', sans-serif; color: #313133; }
        
        .bg-jumia { background-color: var(--jumia-orange) !important; }
        .text-jumia { color: var(--jumia-orange) !important; }
        .btn-jumia { background-color: var(--jumia-orange); color: white; border: none; font-weight: bold; width: 100%; padding: 12px; }
        .btn-jumia:hover { background-color: #e07b1a; color: white; }
        
        /* Panier Styles */
        .cart-card { border: none; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .product-img { width: 80px; height: 80px; object-fit: contain; }
        .quantity-btn { 
            background-color: var(--jumia-orange); 
            color: white; 
            border: none; 
            border-radius: 4px; 
            width: 30px; height: 30px; 
            display: flex; align-items: center; justify-content: center;
        }
        .remove-btn { color: var(--jumia-orange); cursor: pointer; text-transform: uppercase; font-size: 13px; font-weight: bold; }
        .remove-btn:hover { color: #d07517; }

        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark" href="/Home/index">E-commerce <span class="text-warning"><i class="bi bi-star-fill"></i></span></a>
        
        <form class="d-flex flex-grow-1 mx-lg-5 my-2 my-lg-0">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                <input class="form-control border-start-0 nav-search" type="search" placeholder="Chercher un produit, une marque...">
                <button class="btn btn-jumia px-4" type="submit">RECHERCHER</button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto flex-row gap-3">
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-person me-1"></i> Se connecter</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-question-circle me-1"></i> Aide</a></li>
            <li class="nav-item">
                <a class="nav-link position-relative" href="/index.php/Cart/index">
                    <i class="bi bi-cart3 fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-jumia"><?= $_SESSION['cuont'] ?></span>
                    <span class="ms-1">Panier</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container py-4">
    <div class="row g-3">
        
        <div class="col-lg-9">
            <div class="card cart-card">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Panier</h5>
                </div>
                <?php foreach($_SESSION['panie'] as $prd) : ?>
                <div class="card-body p-0">
                    <div class="p-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div class="d-flex align-items-center">
                            <img src=<?= $prd->getImage() ?> class="product-img me-3" alt="Product">
                            <div>
                                <h6 class="mb-1"><?= $prd->getName() ?></h6>
                                <p class="small text-muted mb-1">Vendeur: Jumia Express</p>
                                <p class="small text-success mb-0"><?= $prd->getStock() ?></p>
                            </div>
                        </div>
                        
                        <div class="mt-3 mt-md-0 text-md-end">
                            <h5 class="fw-bold mb-1"><?= $prd->getPrice() ?> DH</h5>
                            <p class="small text-muted text-decoration-line-through mb-2">14,000.00 DH</p>
                            <span class="badge bg-warning text-dark">-11%</span>
                        </div>
                    </div>
                    <?php endforeach?>
                    <!-- <div class="px-3 py-2 border-bottom d-flex justify-content-between align-items-center bg-light-subtle">
                        <div class="remove-btn"><i class="bi bi-trash3 me-1"></i> Supprimer</div>
                        <div class="d-flex align-items-center gap-3">
                            <button class="quantity-btn">-</button>
                            <span class="fw-bold">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                    </div>

                    <div class="p-3 border-bottom d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/100" class="product-img me-3" alt="Product">
                            <div>
                                <h6 class="mb-1">Casque Bluetooth Sans Fil - Noir</h6>
                                <p class="small text-muted mb-1">Vendeur: Tech Store</p>
                                <p class="small text-success mb-0">En stock</p>
                            </div>
                        </div>
                        
                        <div class="mt-3 mt-md-0 text-md-end">
                            <h5 class="fw-bold mb-1">250.00 DH</h5>
                            <p class="small text-muted text-decoration-line-through mb-2">350.00 DH</p>
                        </div>
                    </div>
                    <div class="px-3 py-2 d-flex justify-content-between align-items-center bg-light-subtle rounded-bottom">
                        <div class="remove-btn"><i class="bi bi-trash3 me-1"></i> Supprimer</div>
                        <div class="d-flex align-items-center gap-3">
                            <button class="quantity-btn">-</button>
                            <span class="fw-bold">2</span>
                            <button class="quantity-btn">+</button>
                        </div>
                    </div> -->
                </div>
            </div>
            
            <div class="d-md-none mt-3 p-3 bg-white shadow-sm text-end">
                <p class="mb-0">Total: <span class="fw-bold fs-4">12,999.00 DH</span></p>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card cart-card p-3 mb-3">
                <h6 class="text-uppercase fw-bold border-bottom pb-2 mb-3">Résumé de la commande</h6>
                <div class="d-flex justify-content-between mb-2">
                    <?php foreach($_SESSION['panie'] as $prd){
                        if(empty($total)) $total = 0;
                        $total += $prd->getPrice();
                    }
                    ?>
                    <span>Sous-total</span>
                    <span class="fw-bold"><?= $total ?> DH</span>
                </div>
                <p class="small text-muted mb-3">L'expédition n'est pas encore incluse</p>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold fs-5"><?= $total ?> DH</span>
                </div>
                <a href="/command/index" class="text-decoration-none"><button class="btn btn-jumia shadow-sm">COMMANDER (<?= $total ?> DH)</button> </a>
            </div>
            
            <div class="card cart-card p-3">
                <p class="small fw-bold mb-2">RETOURS GRATUITS</p>
                <p class="small text-muted mb-0">Satisfait ou remboursé sous 15 jours.</p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>