<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icstc
 */

get_header();
?>

	<main id="primary" class="site-main">
		
		<h1>ICSTC</h1>

		<div>
			<h2>Incoming race</h2>
			<div>05 days 04 hours 03 minutes</div>
			<div>Track: Faenza</div>
			<div>Car: Touring Car</div>
		</div>

		<div>
			<h2>Current standings after 3 races:</h2>
			<h3>Leader: Minardi</h3>
			<table>
				<tr>
					<th>Position</th>
					<th>Name</th>
					<th>Points</th>
				</tr>
				<tr>
					<td>1.</td>
					<td>Minardi</td>
					<td>70 PTS</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Pikus</td>
					<td>50 PTS</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Doghouse</td>
					<td>30 PTS</td>
				</tr>
			</table>
		</div>

		<div>
			<h2>Last race results</h2>
			<h3>Winner: Pikus</h3>
			<table>
				<tr>
					<th>Position</th>
					<th>Name</th>
					<th>Points</th>
				</tr>
				<tr>
					<td>1.</td>
					<td>Pikus</td>
					<td>25 PTS</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Minardi</td>
					<td>18 PTS</td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Doghouse</td>
					<td>15 PTS</td>
				</tr>
			</table>
		</div>

	</main><!-- #main -->

	<?php
		$driver = new Driver(1);
		$driver->set_time(1, 3, '00:01:07.575', '2022-04-02 21:06:41' );
	?>

<?php
get_footer();
