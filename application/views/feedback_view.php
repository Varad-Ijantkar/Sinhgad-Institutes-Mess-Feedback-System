<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mess Feedback Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color:rgb(255, 255, 255);
                margin: 0;
                min-height: 100vh;
            }
            .card {
                max-width: 50%;
                margin: 20px auto;
                background-color: #ffffff;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
            .card-header {
                background-color: #472669;
                padding: 24px;
                text-align: center;
                border-bottom: 1px solid rgba(0,0,0,0.05);
            }

			.card-header p {
				margin: 0;
				color: #ffffff;
				font-size: 12px;
				font-weight: lighter;
				padding-top: 10px;
			}
            .card-header h1 {
                margin: 0;
                color: #ffffff;
                font-size: 28px;
                font-weight: 600;
            }
            .card-content {
                padding: 24px;
            }
            .category {
                margin-bottom: 24px;
                padding: 20px;
                border-radius: 12px;
                transition: transform 0.2s, box-shadow 0.2s;
            }
            .category:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            }
            .category h2 {
                margin: 0 0 8px;
                font-size: 20px;
                color: #1a1a1a;
                font-weight: 600;
            }
            .category p {
                margin: 0 0 16px;
                font-size: 14px;
                color: #666;
                line-height: 1.5;
            }
            .stars {
                display: flex;
                gap: 8px;
            }
            .stars button {
                background: none;
                border: none;
                cursor: pointer;
                padding: 4px;
                transition: transform 0.2s;
            }
            .stars button:hover {
                transform: scale(1.1);
            }
            .stars i {
                font-size: 26px;
                color: #ddd;
                transition: color 0.2s;
            }
            .stars i.filled {
                color: #ffc107;
            }
            .bg-orange-50 { background-color: #fff7ed; }
            .bg-green-50 { background-color: #f0fdf4; }
            .bg-purple-50 { background-color: #faf5ff; }
            .bg-blue-50 { background-color: #eff6ff; }
            .bg-yellow-50 { background-color: #fefce8; }
            .bg-red-50 { background-color: #fef2f2; }
            .bg-indigo-50 { background-color: #eef2ff; }
            
            .textarea-wrapper {
                margin-top: 24px;
            }
            .textarea-wrapper label {
                display: block;
                margin-bottom: 8px;
                font-weight: 600;
                color: #1a1a1a;
            }
            .textarea-wrapper textarea {
                width: 100%;
                height: 120px;
                padding: 12px;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                resize: vertical;
                font-family: inherit;
                font-size: 14px;
                transition: border-color 0.2s;
            }
            .textarea-wrapper textarea:focus {
                outline: none;
                border-color: #3b82f6;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            }
            .buttons {
                display: flex;
                gap: 16px;
                margin-top: 24px;
            }
            .buttons button {
                flex: 1;
                padding: 12px;
                font-size: 16px;
                font-weight: 600;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.2s;
            }
            .submit-btn {
                background-color: #643798;
                color: #ffffff;
            }
            .submit-btn:hover {
                background-color: #472669;
            }
            .clear-btn {
                background-color: #e5e7eb;
                color: #4b5563;
            }
            .clear-btn:hover {
                background-color: #d1d5db;
            }
            .overall-score {
                margin-top: 20px;
                text-align: center;
                font-size: 20px;
                font-weight: 600;
                color: #1e3a8a;
                padding: 16px;
                background-color: #f8fafc;
                border-radius: 8px;
            }
        </style>
    </head>
    <body>
	<div class="card">
		<div class="card-header">
			<h1><?php echo isset($mess_name) ? $mess_name : 'Mess Name Not Found'; ?></h1>
			<p>Please rate your experience to help us serve you better.</p>
		</div>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('error'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<?php $this->load->view('template/studentheader');?>
            <div class="card-content">
                <form id="feedbackForm" method="post" action="<?php echo base_url('feedback/submit'); ?>">
                    <input type="hidden" name="student_id" value="<?php echo $this->session->userdata('student_id'); ?>">
                    <input type="hidden" name="mess" value="<?php echo $this->session->userdata('mess'); ?>">
                    <div class="category bg-orange-50">
                        <h2>Taste</h2>
                        <p>Quality and flavor of the food served</p>
                        <div class="stars" data-category="taste">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="taste_rating" id="taste_rating" value="<?php echo set_value('taste_rating'); ?>">
                    </div>
    
                    <div class="category bg-green-50">
                        <h2>Hygiene</h2>
                        <p>Cleanliness of dining area, utensils, and food handling</p>
                        <div class="stars" data-category="hygiene">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="hygiene_rating" id="hygiene_rating" value="<?php echo set_value('hygiene_rating'); ?>">
                    </div>
    
                    <div class="category bg-purple-50">
                        <h2>Variety</h2>
                        <p>Diversity of menu items and food options available</p>
                        <div class="stars" data-category="variety">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="variety_rating" id="variety_rating" value="<?php echo set_value('variety_rating'); ?>">
                    </div>
    
                    <div class="category bg-blue-50">
                        <h2>Service Quality</h2>
                        <p>Staff behavior, responsiveness, and service efficiency</p>
                        <div class="stars" data-category="service">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="service_rating" id="service_rating" value="<?php echo set_value('service_rating'); ?>">
                    </div>
    
                    <div class="category bg-yellow-50">
                        <h2>Infrastructure & Ambiance</h2>
                        <p>Dining environment, seating comfort, and overall atmosphere</p>
                        <div class="stars" data-category="infrastructure">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="infrastructure_rating" id="infrastructure_rating" value="<?php echo set_value('infrastructure_rating'); ?>">
                    </div>
    
                    <div class="category bg-red-50">
                        <h2>Portion Size</h2>
                        <p>Adequacy of food quantity served per plate</p>
                        <div class="stars" data-category="portion">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="portion_rating" id="portion_rating" value="<?php echo set_value('portion_rating'); ?>">
                    </div>
    
                    <div class="category bg-indigo-50">
                        <h2>Timing</h2>
                        <p>Punctuality of meal service and waiting time</p>
                        <div class="stars" data-category="timing">
                            <button type="button" data-value="1"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="2"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="3"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="4"><i class="fas fa-star"></i></button>
                            <button type="button" data-value="5"><i class="fas fa-star"></i></button>
                        </div>
                        <input type="hidden" name="timing_rating" id="timing_rating" value="<?php echo set_value('timing_rating'); ?>">
                    </div>

					<div class="textarea-wrapper">
						<label for="comments">Additional Comments</label>
						<textarea name="comments" id="comments" placeholder="Please share any additional feedback..."><?php echo set_value('comments'); ?></textarea>
					</div>
    
                    <div class="overall-score" id="overall-score">
                        Overall Score: 0/5
                    </div>
    
                    <div class="buttons">
                        <button type="submit" class="submit-btn">Submit Feedback</button>
                        <button type="button" class="clear-btn" id="clearBtn">Clear</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const starContainers = document.querySelectorAll('.stars');
                const overallScoreEl = document.getElementById('overall-score');
                const clearBtn = document.getElementById('clearBtn');
                let ratings = {};

                // Star rating functionality
                starContainers.forEach(container => {
                    const category = container.getAttribute('data-category');
                    const stars = container.querySelectorAll('button');
                    const hiddenInput = document.getElementById(`${category}_rating`);

                    // Handle star hover effects
                    stars.forEach((star, index) => {
                        star.addEventListener('mouseenter', () => {
                            updateStars(container, index + 1);
                        });
                        star.addEventListener('mouseleave', () => {
                            updateStars(container, ratings[category] || 0);
                        });
                        star.addEventListener('click', () => {
                            ratings[category] = index + 1;
                            hiddenInput.value = ratings[category];
                            updateStars(container, ratings[category]);
                            updateOverallScore();
                        });
                    });
                });

                function updateStars(container, rating) {
                    const stars = container.querySelectorAll('i');
                    stars.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.add('filled');
                        } else {
                            star.classList.remove('filled');
                        }
                    });
                }

                function updateOverallScore() {
                    const total = Object.values(ratings).reduce((a, b) => a + b, 0);
                    const count = Object.values(ratings).length;
                    const overall = count ? (total / count).toFixed(1) : 0;
                    overallScoreEl.textContent = `Overall Score: ${overall}/5`;
                }

                // Clear form functionality
                clearBtn.addEventListener('click', () => {
                    ratings = {};
                    starContainers.forEach(container => {
                        updateStars(container, 0);
                        const category = container.getAttribute('data-category');
                        document.getElementById(`${category}_rating`).value = '';
                    });
                    document.getElementById('comments').value = '';
                    updateOverallScore();
                });
            });
        </script>
    </body>
    </html>
