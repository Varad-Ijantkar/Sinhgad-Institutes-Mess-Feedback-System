<div class="content">
    <div class="container">
        <div class="menu-card">
            <h1 class="menu-title">Menu for Students</h1>

            <!-- Form for date and mess selection -->
            <form method="get" id="menuForm" action="<?php echo site_url('mess_menu'); ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Select Date:</label>
                        <div class="date-input">
                            <input type="date" class="form-control" name="date" value="<?php echo $selected_date; ?>" onchange="this.form.submit();">
                            <i class="far fa-calendar"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Select Mess Facility:</label>
                        <select class="form-control" name="mess_id" onchange="this.form.submit();">
                            <?php foreach ($messes as $mess): ?>
                                <option value="<?php echo $mess['mess_id']; ?>" <?php echo $mess['mess_id'] == $selected_mess_id ? 'selected' : ''; ?>>
                                    <?php echo $mess['mess_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </form>

            <!-- Menu Display (Header Removed) -->
            <table class="menu-table">
                <thead>
                    <tr>
                        <th width="15%">Meal</th>
                        <th width="65%">Items</th>
                        <th width="20%">Nutrition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($menu_items)) {
                        $meals = ['Breakfast' => [], 'Lunch' => [], 'Dinner' => []];
                        foreach ($menu_items as $item) {
                            if (isset($item['meal_type']) && isset($item['food']) && isset($item['nutrition'])) {
                                $meals[$item['meal_type']][] = $item;
                            }
                        }
                        foreach ($meals as $meal_type => $items) {
                            if (!empty($items)) {
                                $food_list = implode(', ', array_column($items, 'food'));
                                $total_nutrition = array_sum(array_column($items, 'nutrition'));
                                echo "<tr>";
                                echo "<td class='meal-type'>$meal_type</td>";
                                echo "<td class='menu-items'>$food_list</td>";
                                echo "<td class='nutrition'>$total_nutrition Kcal</td>";
                                echo "</tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='3'>No menu available for this date and mess.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Scoped CSS to .content to avoid affecting header */
    .content .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .content .menu-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 25px;
        margin-bottom: 30px;
    }
    .content .menu-title {
        color: #5e35b1;
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 25px;
        text-align: center;
    }
    .content .form-group {
        margin-bottom: 20px;
    }
    .content .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
        color: #444;
    }
    .content .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 16px;
        transition: all 0.2s ease;
    }
    .content .form-control:focus {
        border-color: #5e35b1;
        outline: none;
        box-shadow: 0 0 0 2px rgba(94, 53, 177, 0.2);
    }
    .content .date-input {
        position: relative;
    }
    .content .date-input i {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }
    .content .menu-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    .content .menu-table th {
        background-color: #5e35b1;
        color: white;
        text-align: left;
        padding: 15px;
        font-weight: 500;
    }
    .content .menu-table td {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
    .content .menu-table tr:last-child td {
        border-bottom: none;
    }
    .content .menu-table tr:nth-child(even) {
        background-color: #f9f5ff;
    }
    .content .meal-type {
        font-weight: 600;
        color: #333;
    }
    .content .menu-items {
        color: #555;
        line-height: 1.5;
    }
    .content .nutrition {
        text-align: right;
        font-weight: 500;
        color: #5e35b1;
    }
    .content .form-row {
        display: flex;
        gap: 20px;
    }
    .content .form-row .form-group {
        flex: 1;
    }
    @media (max-width: 768px) {
        .content .form-row {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>