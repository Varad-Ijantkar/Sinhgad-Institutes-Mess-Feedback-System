<!-- mess_ratings.php -->
<?php
// Load data from the controller
$mess_ratings = isset($mess_ratings) ? $mess_ratings : [];
?>

<div class="content">
	<div class="search-bar-container">
		<div class="search-bar">
			<i class="fas fa-search icon"></i>
			<input type="text" id="searchInput" onkeyup="filterList()" placeholder="Search mess..." autocomplete="off">
		</div>
	</div>

	<div class="mess-list-container">
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
							echo number_format($rating, 1) . ' <i class="fas fa-star star"></i>';
						} else {
							echo 'N/A';
						}
						?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<style>
	:root {
		--primary-color: rgb(87, 49, 125);
		--primary-light: rgba(87, 49, 125, 0.1);
		--primary-hover: rgb(107, 69, 145);
		--background-color: #f5f7fb; /* Match body background from header.php */
		--card-background: #ffffff;
		--border-color: #e1e1e3;
		--text-color: #333333;
		--shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
	}

	/* Content adjustments to move aside for the sidebar */
	.content {
		margin-left: 200px; /* Match sidebar width from adminnavbar.php */
		margin-top: 120px; /* Space for the header (approximate height of header.php) */
		padding: 2rem;
		width: calc(100% - 200px); /* Full width minus sidebar */
		min-height: calc(100vh - 120px); /* Full height minus header */
		transition: margin-left 0.3s ease, width 0.3s ease;
		display: flex;
		flex-direction: column;
	}

	.content.expanded {
		margin-left: 0;
		width: 100%;
	}

	.heading {
		text-align: center;
		margin-bottom: 2.5rem;
	}

	h2 {
		color: var(--primary-color);
		font-size: 2.2rem;
		font-weight: 700;
		margin-bottom: 1rem;
		font-family: 'Quicksand', sans-serif;
	}

	.search-bar-container {
		background-color: var(--card-background);
		border-radius: 16px;
		padding: 1.5rem;
		margin-bottom: 2rem;
		box-shadow: var(--shadow);
		width: 100%;
	}

	.search-bar {
		position: relative;
		max-width: 500px;
		margin: 0 auto;
	}

	.search-bar input {
		width: 100%;
		padding: 0.8rem 1rem 0.8rem 2.5rem; /* Add padding for the icon */
		border: 2px solid var(--border-color);
		border-radius: 8px;
		font-family: 'Quicksand', sans-serif;
		font-size: 0.95rem;
		background-color: var(--card-background);
		color: var(--text-color);
		transition: all 0.3s ease;
	}

	.search-bar input:hover,
	.search-bar input:focus {
		border-color: var(--primary-color);
		outline: none;
		box-shadow: 0 0 0 3px var(--primary-light);
	}

	.search-bar .icon {
		position: absolute;
		left: 10px;
		top: 50%;
		transform: translateY(-50%);
		font-size: 1rem;
		color: var(--text-color);
	}

	.mess-list-container {
		background-color: var(--card-background);
		border-radius: 16px;
		box-shadow: var(--shadow);
		flex: 1;
		width: 100%;
	}

	.mess-list {
		padding: 10px 0;
		list-style: none;
	}

	.mess-list li {
		display: flex;
		align-items: center;
		padding: 1rem 1.5rem;
		border-bottom: 1px solid var(--border-color);
		transition: background-color 0.3s ease;
	}

	.mess-list li:last-child {
		border-bottom: none;
	}

	.mess-list li:hover {
		background-color: var(--primary-light);
	}

	.rank {
		font-weight: 700;
		font-size: 1.25rem;
		width: 50px;
		color: var(--text-color);
		font-family: 'Quicksand', sans-serif;
	}

	.rank.gold {
		color: #fbbf24;
	}

	.rank.silver {
		color: #94a3b8;
	}

	.rank.bronze {
		color: #d97706;
	}

	.mess-name {
		flex: 1;
		font-size: 1rem;
		color: var(--text-color);
		padding: 0 1.25rem;
		font-family: 'Quicksand', sans-serif;
	}

	.rating {
		display: flex;
		align-items: center;
		gap: 0.375rem;
		font-size: 1.125rem;
		font-weight: 600;
		color: var(--text-color);
		background: #f1f5f9;
		padding: 0.375rem 0.75rem;
		border-radius: 8px;
		min-width: 80px;
		justify-content: center;
		font-family: 'Quicksand', sans-serif;
	}

	.star {
		color: #fbbf24;
		font-size: 1.25rem;
	}

	@media (max-width: 768px) {
		.content {
			padding: 1rem;
			margin-left: 0;
			width: 100%;
		}

		.search-bar-container {
			padding: 1rem;
		}

		.mess-list li {
			padding: 0.8rem 1rem;
		}

		.rank {
			font-size: 1rem;
			width: 40px;
		}

		.mess-name {
			font-size: 0.9rem;
			padding: 0 1rem;
		}

		.rating {
			font-size: 1rem;
			padding: 0.3rem 0.6rem;
		}

		h2 {
			font-size: 1.8rem;
		}
	}

	@media (max-width: 576px) {
		.rank {
			font-size: 0.9rem;
			width: 35px;
		}

		.mess-name {
			font-size: 0.85rem;
			padding: 0 0.75rem;
		}

		.rating {
			font-size: 0.9rem;
			padding: 0.25rem 0.5rem;
		}

		h2 {
			font-size: 1.5rem;
		}
	}
</style>

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
