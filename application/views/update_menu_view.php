<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #48276a;
            --primary-light: #6a3d99;
            --primary-dark: #36134d;
            --primary-gradient: linear-gradient(135deg, #48276a 0%, #6a3d99 100%);
            --secondary-gradient: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%);
            --accent-color: #ffd166;
            --dark-bg: #1f2937;
            --light-bg: #f8f9fb;
            --card-bg: #ffffff;
            --text-dark: #2d3748;
            --text-light: #6b7280;
            --text-muted: #9ca3af;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --border-radius: 12px;
            --border-radius-sm: 8px;
            --box-shadow: 0 10px 25px -5px rgba(72, 39, 106, 0.1), 0 8px 10px -6px rgba(72, 39, 106, 0.05);
            --box-shadow-hover: 0 20px 25px -5px rgba(72, 39, 106, 0.15), 0 10px 10px -5px rgba(72, 39, 106, 0.1);
            --header-height: 120px;
            --sidebar-width: 200px;
            --sidebar-collapsed-width: 0px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-image: 
                radial-gradient(circle at 20% 35%, rgba(72, 39, 106, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 75% 15%, rgba(72, 39, 106, 0.04) 0%, transparent 40%);
            background-attachment: fixed;
        }

        .content-wrapper {
            margin-top: var(--header-height);
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: calc(100vh - var(--header-height));
            padding: 2rem;
            transition: var(--transition);
        }

        body.sidebar-closed .content-wrapper {
            margin-left: var(--sidebar-collapsed-width);
            width: 100%;
        }

        .container {
            max-width: 1260px;
            width: 100%;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        main {
            padding: 1.5rem 0;
        }

        .page-title {
            margin-bottom: 2.5rem;
            font-size: 2.2rem;
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
            padding-bottom: 0.5rem;
        }

        .page-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60%;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        .date-selector {
            background: var(--card-bg);
            padding: 1.8rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 2.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: center;
            justify-content: space-between;
            border-top: 5px solid var(--primary-color);
        }

        .date-selector h2 {
            font-size: 1.3rem;
            margin-bottom: 0.7rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .date-picker {
            padding: 0.85rem 1.2rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.7rem;
            font-size: 1rem;
            min-width: 220px;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            transition: var(--transition);
            background-color: #fafbfc;
        }

        .date-picker:focus {
            border-color: var(--primary-light);
            outline: none;
            box-shadow: 0 0 0 3px rgba(72, 39, 106, 0.1);
        }

        .mess-info {
            background: var(--primary-gradient);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            box-shadow: 0 4px 12px rgba(72, 39, 106, 0.2);
            transition: var(--transition);
        }

        .mess-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(72, 39, 106, 0.3);
        }

        .meal-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-bottom: 3rem;
        }

        .meal-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid rgba(72, 39, 106, 0.05);
        }

        .meal-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow-hover);
        }

        .meal-header {
            padding: 1.5rem;
            background: var(--primary-gradient);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .meal-header::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .meal-header h2 {
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .meal-header h2 i {
            font-size: 1.2rem;
            background: rgba(255, 255, 255, 0.2);
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .kcal-counter {
            background: rgba(255, 255, 255, 0.25);
            padding: 0.4rem 1rem;
            border-radius: 30px;
            font-size: 0.95rem;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .kcal-counter::before {
            content: '🔥';
            font-size: 0.85rem;
        }

        .meal-content {
            padding: 1.8rem;
        }

        .food-items {
            margin-bottom: 1.5rem;
            max-height: 320px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .food-items::-webkit-scrollbar {
            width: 6px;
        }

        .food-items::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .food-items::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        .food-items::-webkit-scrollbar-thumb:hover {
            background: #c1c5cd;
        }

        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid rgba(72, 39, 106, 0.06);
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            background-color: rgba(255, 255, 255, 0.5);
        }

        .food-item:hover {
            background-color: rgba(72, 39, 106, 0.03);
        }

        .food-item:last-child {
            border-bottom: none;
        }

        .food-name {
            font-weight: 500;
        }

        .food-actions {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .food-kcal {
            background: #f3f0ff;
            color: var(--primary-color);
            padding: 0.25rem 0.7rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid rgba(72, 39, 106, 0.1);
        }

        .remove-btn {
            color: var(--danger);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            opacity: 0.7;
            transition: var(--transition);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            opacity: 1;
            background-color: rgba(239, 68, 68, 0.1);
        }

        .add-food-wrapper {
            display: flex;
            gap: 0.8rem;
        }

        .select-food {
            flex-grow: 1;
            height: 48px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.85rem 1.5rem;
            border-radius: 0.7rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 0.95rem;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.01em;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(72, 39, 106, 0.25);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 16px rgba(72, 39, 106, 0.35);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--secondary-gradient);
            color: white;
            box-shadow: 0 4px 12px rgba(255, 94, 98, 0.25);
        }

        .btn-secondary:hover {
            box-shadow: 0 6px 16px rgba(255, 94, 98, 0.35);
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            background: white;
            color: var(--text-dark);
        }

        .btn-outline:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: #f9f6ff;
        }

        .btn-add {
            padding: 0.85rem;
            width: 48px;
            height: 48px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 1.2rem;
            margin-top: 2rem;
        }

        .new-food-section {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--primary-color);
        }

        .new-food-section::before {
            content: '';
            position: absolute;
            bottom: -60px;
            right: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(72, 39, 106, 0.03);
            z-index: 0;
        }

        .new-food-section h2 {
            font-size: 1.4rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: var(--primary-color);
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .new-food-section h2 i {
            color: var(--success);
            font-size: 1.2rem;
            background: rgba(16, 185, 129, 0.1);
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .form-group {
            margin-bottom: 1.2rem;
            position: relative;
            z-index: 1;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 0.7rem;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            transition: var(--transition);
            background-color: #fafbfc;
        }

        .form-control:focus {
            border-color: var(--primary-light);
            outline: none;
            box-shadow: 0 0 0 3px rgba(72, 39, 106, 0.1);
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .form-row .form-group {
            flex: 1 1 240px;
        }

        .menu-preview {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2.5rem;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(72, 39, 106, 0.05);
        }

        .menu-preview::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--primary-gradient);
        }

        .menu-preview h2 {
            font-size: 1.6rem;
            margin-bottom: 2rem;
            text-align: center;
            color: var(--primary-color);
            position: relative;
            font-weight: 600;
        }

        .menu-preview h2::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: var(--primary-gradient);
            margin: 0.8rem auto 0;
            border-radius: 2px;
        }

        .preview-content {
            display: flex;
            flex-direction: column;
            gap: 1.8rem;
        }

        .preview-meal {
            padding: 1.5rem;
            border-radius: 0.8rem;
            background: #f8f9fb;
            border: 1px solid rgba(72, 39, 106, 0.07);
            transition: var(--transition);
        }

        .preview-meal:hover {
            background: #f3f0ff;
            border-color: rgba(72, 39, 106, 0.15);
            transform: translateY(-2px);
        }

        .preview-meal-header {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            padding-bottom: 0.8rem;
            border-bottom: 1px dashed rgba(72, 39, 106, 0.1);
            color: var(--primary-dark);
        }

        .preview-items {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .preview-item {
            background: white;
            padding: 0.6rem 1rem;
            border-radius: 0.7rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border: 1px solid rgba(72, 39, 106, 0.07);
            transition: var(--transition);
        }

        .preview-item:hover {
            box-shadow: 0 4px 8px rgba(72, 39, 106, 0.1);
            border-color: rgba(72, 39, 106, 0.2);
        }

        .preview-item span {
            color: var(--primary-color);
            font-weight: 500;
            font-size: 0.85rem;
            padding: 0.15rem 0.5rem;
            background: #f3f0ff;
            border-radius: 12px;
        }

        .daily-total {
            text-align: right;
            font-weight: 600;
            font-size: 1.2rem;
            margin-top: 1.5rem;
            padding-top: 1.2rem;
            border-top: 2px dashed rgba(72, 39, 106, 0.15);
            color: var(--text-dark);
        }

        .daily-total span {
            color: var(--primary-color);
            background: #f3f0ff;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            margin-left: 0.5rem;
            font-size: 1.1rem;
        }

        .toast {
            position: fixed;
            top: 30px;
            right: 30px;
            padding: 1.2rem 1.8rem;
            border-radius: 0.8rem;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.18);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 1000;
            animation: slideIn 0.3s ease forwards, fadeOut 0.5s ease 2.5s forwards;
            max-width: 380px;
        }

        .toast-success {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .toast-error {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .toast i {
            font-size: 1.2rem;
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .select2-container--default .select2-selection--single {
            height: 48px;
            display: flex;
            align-items: center;
            border: 2px solid #e2e8f0;
            border-radius: 0.7rem;
            background-color: #fafbfc;
            transition: var(--transition);
        }

        .select2-container--default .select2-selection--single:hover {
            border-color: #d1d5db;
        }

        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(72, 39, 106, 0.1);
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px;
        }

        .select2-dropdown {
            border: 2px solid var(--primary-light);
            border-radius: 0.7rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .select2-results__option {
            padding: 0.8rem 1rem;
            transition: var(--transition);
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: var(--primary-light);
        }

        @media (max-width: 1200px) {
            .container { max-width: 1000px; }
            .meal-sections { grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); }
        }

        @media (max-width: 992px) {
            .content-wrapper { padding: 1.5rem; }
            .meal-sections { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }
        }

        @media (max-width: 768px) {
            :root { --header-height: 100px; }

            .content-wrapper {
                margin-left: var(--sidebar-collapsed-width);
                width: 100%;
                padding: 1.2rem;
            }

            body.sidebar-open .content-wrapper {
                margin-left: var(--sidebar-width);
                width: calc(100% - var(--sidebar-width));
            }

            .meal-sections { grid-template-columns: 1fr; }
            .date-selector { flex-direction: column; align-items: flex-start; }
            .actions { flex-direction: column; }
            .btn { width: 100%; }
            .page-title { font-size: 1.8rem; }
            .container { padding: 0 0.8rem; }
            .menu-preview, .new-food-section { padding: 1.5rem; }
        }

        @media (max-width: 576px) {
            .page-title { font-size: 1.5rem; }
            .meal-header h2 { font-size: 1.1rem; }
            .kcal-counter { font-size: 0.85rem; }
            .date-picker { width: 100%; }
            .meal-content, .date-selector { padding: 1.2rem; }
            .add-food-wrapper { flex-direction: column; }
            .btn { padding: 0.75rem 1.2rem; }
            .preview-meal-header { font-size: 1rem; }
            .daily-total { font-size: 1.1rem; }
            .meal-header h2 i { width: 32px; height: 32px; }
        }
    </style>
</head>
<body>

    <div class="toast" id="toast" style="display: none;">
        <i class="fas fa-check-circle"></i>
        <span id="toast-message"></span>
    </div>

    <div class="content-wrapper">
        <main class="container">
            <h1 class="page-title">Daily Menu Creator</h1>

            <div class="date-selector">
                <div>
                    <h2><i class="fas fa-calendar-alt"></i> Select Date</h2>
                    <input type="date" class="date-picker" id="menuDate" value="<?= htmlspecialchars($selected_date) ?>">
                </div>
                <div class="mess-info">
                    <i class="fas fa-store"></i>
                    <span><?= htmlspecialchars($mess_info->mess_name) ?> (ID: <?= htmlspecialchars($mess_info->mess_id) ?>)</span>
                </div>
            </div>

            <div class="meal-sections">
                <div class="meal-card">
                    <div class="meal-header">
                        <h2><i class="fas fa-coffee"></i> Breakfast</h2>
                        <div class="kcal-counter" id="breakfast-kcal">0 Kcal</div>
                    </div>
                    <div class="meal-content">
                        <div class="food-items" id="breakfast-items"></div>
                        <div class="add-food-wrapper">
                            <select class="select-food" id="breakfast-food-select">
                                <option value="">Select Food Item</option>
                                <?php foreach ($food_items as $item): ?>
                                    <option value="<?= $item->food_id ?>" data-kcal="<?= $item->nutrition ?>"><?= htmlspecialchars($item->food) ?> (<?= $item->nutrition ?> Kcal)</option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary btn-add add-food-btn" data-meal="breakfast">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="meal-card">
                    <div class="meal-header">
                        <h2><i class="fas fa-sun"></i> Lunch</h2>
                        <div class="kcal-counter" id="lunch-kcal">0 Kcal</div>
                    </div>
                    <div class="meal-content">
                        <div class="food-items" id="lunch-items"></div>
                        <div class="add-food-wrapper">
                            <select class="select-food" id="lunch-food-select">
                                <option value="">Select Food Item</option>
                                <?php foreach ($food_items as $item): ?>
                                    <option value="<?= $item->food_id ?>" data-kcal="<?= $item->nutrition ?>"><?= htmlspecialchars($item->food) ?> (<?= $item->nutrition ?> Kcal)</option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary btn-add add-food-btn" data-meal="lunch">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="meal-card">
                    <div class="meal-header">
                        <h2><i class="fas fa-moon"></i> Dinner</h2>
                        <div class="kcal-counter" id="dinner-kcal">0 Kcal</div>
                    </div>
                    <div class="meal-content">
                        <div class="food-items" id="dinner-items"></div>
                        <div class="add-food-wrapper">
                            <select class="select-food" id="dinner-food-select">
                                <option value="">Select Food Item</option>
                                <?php foreach ($food_items as $item): ?>
                                    <option value="<?= $item->food_id ?>" data-kcal="<?= $item->nutrition ?>"><?= htmlspecialchars($item->food) ?> (<?= $item->nutrition ?> Kcal)</option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary btn-add add-food-btn" data-meal="dinner">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="new-food-section">
                <h2><i class="fas fa-plus-circle"></i> Add New Food Item</h2>
                <form id="addFoodForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="foodName">Food Name</label>
                            <input type="text" class="form-control" id="foodName" required>
                        </div>
                        <div class="form-group">
                            <label for="foodCalories">Calories (Kcal)</label>
                            <input type="number" class="form-control" id="foodCalories" required min="1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-save"></i> Save Food Item
                    </button>
                </form>
            </div>

            <div class="menu-preview">
                <h2>Menu Preview</h2>
                <div class="preview-content">
                    <div class="preview-meal">
                        <div class="preview-meal-header">
                            <span>Breakfast</span>
                            <span id="preview-breakfast-kcal">0 Kcal</span>
                        </div>
                        <div class="preview-items" id="preview-breakfast-items"></div>
                    </div>
                    <div class="preview-meal">
                        <div class="preview-meal-header">
                            <span>Lunch</span>
                            <span id="preview-lunch-kcal">0 Kcal</span>
                        </div>
                        <div class="preview-items" id="preview-lunch-items"></div>
                    </div>
                    <div class="preview-meal">
                        <div class="preview-meal-header">
                            <span>Dinner</span>
                            <span id="preview-dinner-kcal">0 Kcal</span>
                        </div>
                        <div class="preview-items" id="preview-dinner-items"></div>
                    </div>
                    <div class="daily-total">
                        Total Daily Calories: <span id="total-daily-kcal">0 Kcal</span>
                    </div>
                </div>
            </div>

            <div class="actions">
                <button class="btn btn-outline" id="resetMenuBtn">
                    <i class="fas fa-redo"></i> Reset Menu
                </button>
                <button class="btn btn-primary" id="saveMenuBtn">
                    <i class="fas fa-save"></i> Display Menu
                </button>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-food').select2({
                placeholder: "Select food item",
                width: '100%'
            });

            const menuData = {
                breakfast: [],
                lunch: [],
                dinner: []
            };

            $('.add-food-btn').on('click', function() {
                const mealType = $(this).data('meal');
                const selectElement = $(`#${mealType}-food-select`);
                const foodId = selectElement.val();

                if (!foodId) return;

                const foodName = selectElement.find('option:selected').text();
                const foodKcal = parseInt(selectElement.find('option:selected').data('kcal'));

                const itemId = `${mealType}-${foodId}-${Date.now()}`;

                menuData[mealType].push({
                    id: itemId,
                    food_id: foodId,
                    name: foodName,
                    kcal: foodKcal
                });

                addFoodItemToUI(mealType, itemId, foodName, foodKcal);
                updateMealTotals(mealType);
                updateDailyTotal();

                selectElement.val('').trigger('change');
                showToast('Food item added successfully!', 'success');
            });

            function addFoodItemToUI(mealType, itemId, foodName, foodKcal) {
                const itemHtml = `
                    <div class="food-item" data-id="${itemId}">
                        <div class="food-name">${foodName.split('(')[0].trim()}</div>
                        <div class="food-actions">
                            <span class="food-kcal">${foodKcal} Kcal</span>
                            <button class="remove-btn" data-meal="${mealType}" data-id="${itemId}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                `;
                $(`#${mealType}-items`).append(itemHtml);

                const previewItemHtml = `
                    <div class="preview-item" data-id="${itemId}">
                        ${foodName.split('(')[0].trim()}
                        <span>${foodKcal} Kcal</span>
                    </div>
                `;
                $(`#preview-${mealType}-items`).append(previewItemHtml);
            }

            $(document).on('click', '.remove-btn', function() {
                const mealType = $(this).data('meal');
                const itemId = $(this).data('id');

                menuData[mealType] = menuData[mealType].filter(item => item.id !== itemId);

                $(`.food-item[data-id="${itemId}"]`).remove();
                $(`.preview-item[data-id="${itemId}"]`).remove();

                updateMealTotals(mealType);
                updateDailyTotal();

                showToast('Food item removed', 'success');
            });

            function updateMealTotals(mealType) {
                const totalKcal = menuData[mealType].reduce((sum, item) => sum + item.kcal, 0);
                $(`#${mealType}-kcal`).text(`${totalKcal} Kcal`);
                $(`#preview-${mealType}-kcal`).text(`${totalKcal} Kcal`);
            }

            function updateDailyTotal() {
                const dailyTotal = Object.values(menuData).flat().reduce((sum, item) => sum + item.kcal, 0);
                $('#total-daily-kcal').text(`${dailyTotal} Kcal`);
            }

            function showToast(message, type = 'success') {
                const toast = $('#toast');
                $('#toast-message').text(message);
                toast.removeClass('toast-success toast-error').addClass(`toast-${type}`).show();
                setTimeout(() => toast.hide(), 3000);
            }

            $('#menuDate').on('change', function() {
                const selectedDate = $(this).val();
                resetMenu();
                loadMenuForDate(selectedDate);
                showToast(`Menu date changed to ${selectedDate}`, 'success');
            });

            $('#addFoodForm').on('submit', function(e) {
                e.preventDefault();
                const foodName = $('#foodName').val();
                const foodCalories = $('#foodCalories').val();

                $.ajax({
                    url: '<?= base_url('Update_Menu/add_food_item') ?>',
                    type: 'POST',
                    data: { food_name: foodName, food_calories: foodCalories },
                    success: function(response) {
                        const res = JSON.parse(response);
                        if (res.status === 'success') {
                            showToast(res.message, 'success');
                            const newOption = `<option value="${res.food_item.food_id}" data-kcal="${res.food_item.nutrition}">${res.food_item.food} (${res.food_item.nutrition} Kcal)</option>`;
                            $('.select-food').append(newOption);
                            $('#addFoodForm')[0].reset();
                        } else {
                            showToast(res.message, 'error');
                        }
                    },
                    error: function() {
                        showToast('Error adding food item', 'error');
                    }
                });
            });

            $('#resetMenuBtn').on('click', function() {
                if (confirm('Are you sure you want to reset the menu? All changes will be lost.')) {
                    resetMenu();
                    showToast('Menu has been reset', 'success');
                }
            });

            function resetMenu() {
                menuData.breakfast = [];
                menuData.lunch = [];
                menuData.dinner = [];

                $('#breakfast-items, #lunch-items, #dinner-items').empty();
                $('#preview-breakfast-items, #preview-lunch-items, #preview-dinner-items').empty();

                $('#breakfast-kcal, #lunch-kcal, #dinner-kcal').text('0 Kcal');
                $('#preview-breakfast-kcal, #preview-lunch-kcal, #preview-dinner-kcal').text('0 Kcal');
                $('#total-daily-kcal').text('0 Kcal');
            }

            $('#saveMenuBtn').on('click', function() {
                const selectedDate = $('#menuDate').val();

                if (!selectedDate) {
                    showToast('Please select a date', 'error');
                    return;
                }

                if (!menuData.breakfast.length && !menuData.lunch.length && !menuData.dinner.length) {
                    showToast('Please add at least one food item', 'error');
                    return;
                }

                const menuSubmitData = {
                    date: selectedDate,
                    mess_id: <?= json_encode($mess_info->mess_id) ?>,
                    meals: {
                        breakfast: menuData.breakfast.map(item => ({ food_id: item.food_id })),
                        lunch: menuData.lunch.map(item => ({ food_id: item.food_id })),
                        dinner: menuData.dinner.map(item => ({ food_id: item.food_id }))
                    }
                };

                $.ajax({
                    url: '<?= base_url('Update_Menu/save_menu') ?>',
                    type: 'POST',
                    data: { menu_data: JSON.stringify(menuSubmitData) },
                    success: function(response) {
                        const res = JSON.parse(response);
                        showToast(res.message, res.status === 'success' ? 'success' : 'error');
                    },
                    error: function() {
                        showToast('Server error while saving menu', 'error');
                    }
                });
            });

            function loadMenuForDate(date) {
                if (!date) return;

                $.ajax({
                    url: '<?= base_url('Update_Menu/get_menu') ?>',
                    type: 'GET',
                    data: { date: date, mess_id: <?= json_encode($mess_info->mess_id) ?> },
                    success: function(response) {
                        const res = JSON.parse(response);
                        if (res.status === 'success' && res.menu) {
                            populateMenuData(res.menu);
                        }
                    },
                    error: function() {
                        showToast('Error loading menu data', 'error');
                    }
                });
            }

            function populateMenuData(menu) {
                resetMenu();
                ['breakfast', 'lunch', 'dinner'].forEach(mealType => {
                    if (menu[mealType] && menu[mealType].length) {
                        menu[mealType].forEach(item => {
                            const itemId = `${mealType}-${item.food_id}-${Date.now()}`;
                            menuData[mealType].push({
                                id: itemId,
                                food_id: item.food_id,
                                name: `${item.food_name} (${item.kcal} Kcal)`,
                                kcal: item.kcal
                            });
                            addFoodItemToUI(mealType, itemId, `${item.food_name} (${item.kcal} Kcal)`, item.kcal);
                        });
                        updateMealTotals(mealType);
                    }
                });
                updateDailyTotal();
            }

            const initialDate = $('#menuDate').val();
            if (initialDate) loadMenuForDate(initialDate);
        });
    </script>
</body>
</html>