<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories | Jumia Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root { --jumia-orange: #f68b1e; --jumia-bg: #f5f5f5; }
        body { background-color: var(--jumia-bg); font-family: 'Roboto', sans-serif; }
        
        /* Sidebar Styles */
        .filter-section { background: white; border-radius: 4px; padding: 15px; margin-bottom: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .filter-title { font-size: 14px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px; }
        .filter-list { list-style: none; padding: 0; font-size: 14px; }
        .filter-list li { margin-bottom: 8px; cursor: pointer; }
        .filter-list li:hover { color: var(--jumia-orange); }

        /* Product Card Styles */
        .product-card { border: none; border-radius: 4px; transition: 0.3s; position: relative; background: white; }
        .product-card:hover { box-shadow: 0 5px 15px rgba(0,0,0,0.1); transform: scale(1.02); z-index: 1; }
        .product-img { padding: 15px; object-fit: contain; height: 200px; }
        .btn-add { background: var(--jumia-orange); color: white; opacity: 0; transition: 0.3s; width: 100%; border: none; padding: 8px; }
        .product-card:hover .btn-add { opacity: 1; }
        
        .breadcrumb { font-size: 12px; }
        .breadcrumb-item a { color: #75757a; text-decoration: none; }
        .price { font-size: 18px; font-weight: bold; color: #313133; }
        .old-price { font-size: 14px; color: #75757a; text-decoration: line-through; }
    </style>
</head>
<body>

<div class="container py-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item"><a href="#">Informatique</a></li>
        <li class="breadcrumb-item active">Ordinateurs Portables</li>
      </ol>
    </nav>

    <div class="row g-3">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="filter-section">
                <div class="filter-title">Catégorie</div>
                <ul class="filter-list">
                    <li class="fw-bold">Ordinateurs Portables</li>
                    <li>Accessoires</li>
                    <li>Stockage</li>
                </ul>
            </div>

            <div class="filter-section">
                <div class="filter-title">Marque</div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="hp">
                    <label class="form-check-label" for="hp">HP</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="apple">
                    <label class="form-check-label" for="apple">Apple</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="dell">
                    <label class="form-check-label" for="dell">Dell</label>
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-title">Prix (DH)</div>
                <input type="range" class="form-range" min="0" max="20000">
                <div class="d-flex justify-content-between mt-2">
                    <span>0 DH</span>
                    <span>20,000 DH</span>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="bg-white p-3 mb-3 d-flex justify-content-between align-items-center rounded shadow-sm">
                <h5 class="mb-0 fw-bold">Ordinateurs Portables <span class="text-muted fs-6 fw-normal">(1200 produits)</span></h5>
                <select class="form-select form-select-sm w-auto">
                    <option>Trier par: Popularité</option>
                    <option>Prix: Le plus bas</option>
                    <option>Prix: Le plus haut</option>
                </select>
            </div>

            <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-2">
                <div class="col">
                    <div class="card h-100 product-card p-2">
                        <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="PC">
                        <div class="card-body p-1">
                            <p class="mb-1 text-truncate" style="font-size: 14px;">HP Laptop 15-dw3033dx Intel Core i3...</p>
                            <div class="price">4,500 DH</div>
                            <div class="old-price">5,200 DH</div>
                            <div class="text-warning small mb-2">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (45)
                            </div>
                        </div>
                        <button class="btn-add rounded-bottom">AJOUTER AU PANIER</button>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100 product-card p-2">
                        <img src="https://via.placeholder.com/200" class="card-img-top product-img" alt="PC">
                        <div class="card-body p-1">
                            <p class="mb-1 text-truncate" style="font-size: 14px;">MacBook Air M2 - 8GB RAM - 256GB SSD</p>
                            <div class="price">11,900 DH</div>
                            <span class="badge bg-info text-dark mb-2" style="font-size: 10px;">JUMIA EXPRESS</span>
                            <div class="text-warning small mb-2">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> (12)
                            </div>
                        </div>
                        <button class="btn-add rounded-bottom">AJOUTER AU PANIER</button>
                    </div>
                </div>

                </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>