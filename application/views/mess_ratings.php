<?php
// Load data from the controller
$mess_ratings = isset($mess_ratings) ? $mess_ratings : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mess Ratings</title>
	<style>
		:root {
			--primary-gradient: linear-gradient(135deg, #2563eb, #7c3aed);
			--card-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
			--transition-speed: 0.3s;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background: #f3f4f6;
			min-height: 100vh;
			align-items: center;
			justify-content: center;
		}

		.card {
			background: #ffffff;
			box-shadow: var(--card-shadow);
			border-radius: 16px;
			width: 100%;
			max-width: 700px;
			margin: 20px auto;
			overflow: hidden;
			transition: transform var(--transition-speed);
		}

		.card:hover {
			transform: translateY(-5px);
		}

		.card-header {
			background: var(--primary-gradient);
			padding: 24px 20px;
			text-align: center;
		}

		.card-header h1 {
			color: #ffffff;
			font-size: 28px;
			font-weight: 700;
			margin-bottom: 20px;
			letter-spacing: -0.5px;
		}

		.search-bar {
			position: relative;
			max-width: 500px;
			margin: 0 auto;
		}

		.search-bar input {
			width: 100%;
			padding: 12px 48px;
			border: none;
			border-radius: 12px;
			background: rgba(255, 255, 255, 0.9);
			font-size: 16px;
			transition: all var(--transition-speed);
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		.search-bar input:focus {
			background: #ffffff;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
			outline: none;
		}

		.search-bar .icon {
			position: absolute;
			left: 16px;
			top: 50%;
			transform: translateY(-50%);
			font-size: 18px;
			color: #6b7280;
		}

		.mess-list {
			padding: 10px 0;
			list-style: none;
		}

		.mess-list li {
			display: flex;
			align-items: center;
			padding: 16px 24px;
			border-bottom: 1px solid #e5e7eb;
			transition: background-color var(--transition-speed);
		}

		.mess-list li:last-child {
			border-bottom: none;
		}

		.mess-list li:hover {
			background-color: #f8fafc;
		}

		.rank {
			font-weight: 700;
			font-size: 20px;
			width: 50px;
			color: #64748b;
		}

		.rank.gold {
			color: #fbbf24;
			text-shadow: 0 0 10px rgba(251, 191, 36, 0.3);
		}

		.rank.silver {
			color: #94a3b8;
			text-shadow: 0 0 10px rgba(148, 163, 184, 0.3);
		}

		.rank.bronze {
			color: #d97706;
			text-shadow: 0 0 10px rgba(217, 119, 6, 0.3);
		}

		.mess-name {
			flex: 1;
			font-size: 16px;
			color: #1e293b;
			padding: 0 20px;
		}

		.rating {
			display: flex;
			align-items: center;
			gap: 6px;
			font-size: 18px;
			font-weight: 600;
			color: #0f172a;
			background: #f1f5f9;
			padding: 6px 12px;
			border-radius: 8px;
			min-width: 80px;
			justify-content: center;
		}

		.star {
			color: #eab308;
			font-size: 20px;
		}
	</style>
</head>
<body>
<div class="card">
	<div class="card-header">
		<h1>Mess Ratings Board</h1>
		<div class="search-bar">
			<input
				type="text"
				id="searchInput"
				onkeyup="filterList()"
				placeholder="Search mess..."
				autocomplete="off"
			>
			<span class="icon">🔍</span>
		</div>
	</div>
	<ul class="mess-list" id="messList">
		<?php
		$all_mess_names = [
			'Om Sai Mess', 'Vatsalya Mess', 'Annapoorna - I Mess', 'Annapoorna - II Mess',
			'Ashwini Mess', 'Nandinee Mess', 'Abhilasha Mess', 'Geetanjali Mess',
			'Rohini Mess', 'Laxmi Mess', 'Shree Ganesh Mess', 'Sahdev Mess',
			'Arjun Mess', 'Indrajit Mess', 'Kamala Mess', 'Sharada Mess',
			'Amrapali Mess (Girls)', 'Annapoorna (Boys)'
		];

		foreach ($all_mess_names as $index => $mess_name):
			$rating = null;
			foreach ($mess_ratings as $mess) {
				if (isset($mess['mess']) && $mess['mess'] === $mess_name) {
					$rating = $mess['overall_rating'];
					break;
				}
			}

			$rank_class = '';
			if ($index === 0) $rank_class = 'gold';
			elseif ($index === 1) $rank_class = 'silver';
			elseif ($index === 2) $rank_class = 'bronze';
			?>
			<li data-rating="<?php echo $rating !== null ? $rating : 'N/A'; ?>">
				<div class="rank <?php echo $rank_class; ?>">
					#<?php echo $index + 1; ?>
				</div>
				<div class="mess-name">
					<?php echo htmlspecialchars($mess_name); ?>
				</div>
				<div class="rating">
					<?php
					if ($rating !== null) {
						echo number_format($rating, 1) . ' <span class="star">★</span>';
					} else {
						echo 'N/A';
					}
					?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<script>
	function filterList() {
		const input = document.getElementById('searchInput');
		const filter = input.value.toLowerCase();
		const list = document.getElementById('messList');
		const items = list.getElementsByTagName('li');

		for (let i = 0; i < items.length; i++) {
			const name = items[i].getElementsByClassName('mess-name')[0];
			items[i].style.display = name.innerText.toLowerCase().includes(filter) ? '' : 'none';
		}
	}
</script>
</body>
</html>
