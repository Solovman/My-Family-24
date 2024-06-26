<?php


declare(strict_types=1);

use \Up\Tree\Services\Repository\UserService;

/**
 * @var CMain $APPLICATION
 */

global $USER;

$currentUrl = request()->getRequestUri();
?>

<!doctype html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php $APPLICATION->ShowTitle(); ?></title>
	<link rel="stylesheet" href="style/reset.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
		  crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"></script>
	<?php
	$APPLICATION->ShowHead();
	?>
</head>
<body>
<?php $APPLICATION->ShowPanel(); ?>

<header class="header">
	<nav class="header__nav">
		<ul class="header__nav-list">
			<li data-title="<?= GetMessage('UP_HEADER_NAV_MY_TREES') ?>" class="header__nav-item">
				<a href="/" class="header__nav-link">
					<svg id="_Слой_2" data-name="Слой 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.81 22.76">
						<defs>
							<style>
								.cls-1 {
									fill: #fff;
								}
							</style>
						</defs>
						<g id="_Слой_1" data-name="Слой 1">
							<g>
								<rect class="cls-1" x="7.33" y="15.96" width="2" height="6.8" rx=".36" ry=".36"/>
								<path class="cls-1" d="m12.49,16.94H4.2c-2.3,0-4.2-1.87-4.2-4.2,0-1.24.53-2.38,1.44-3.19-.18-.48-.28-1.01-.28-1.52,0-1.77,1.09-3.31,2.71-3.94.2-2.3,2.12-4.1,4.48-4.1s4.27,1.8,4.5,4.1c1.59.61,2.71,2.15,2.71,3.94,0,.53-.1,1.04-.28,1.52.91.78,1.44,1.95,1.44,3.19-.03,2.33-1.92,4.2-4.22,4.2Z"/>
							</g>
						</g>
						<g id="_Слой_1-2" data-name="Слой 1">
							<g>
								<rect class="cls-1" x="19.59" y="18.97" width="1.11" height="3.79" rx=".2" ry=".2"/>
								<path class="cls-1" d="m22.46,19.52h-4.62c-1.28,0-2.34-1.04-2.34-2.34,0-.69.3-1.32.8-1.77-.1-.27-.15-.56-.15-.84,0-.99.61-1.84,1.51-2.2.11-1.28,1.18-2.28,2.49-2.28s2.38,1,2.51,2.28c.89.34,1.51,1.2,1.51,2.2,0,.3-.06.58-.15.84.51.44.8,1.08.8,1.77-.01,1.3-1.07,2.34-2.35,2.34Z"/>
							</g>
						</g>
					</svg>
				</a>
			</li>
			<li id="pdf" data-title="<?= GetMessage('UP_HEADER_NAV_EXPORT') ?>" class="header__nav-item">
				<a href="#" class="header__nav-link">
					<svg class="header__svg" width="30px" height="30px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<rect x="0" fill="none" width="20" height="20"/>
						<g>
							<style>.st0{fill-rule:evenodd;clip-rule:evenodd;}</style>
							<path class="header__svg-path" fill="#ffff" d="M5.8 14H5v1h.8c.3 0 .5-.2.5-.5s-.2-.5-.5-.5zM11 2H3v16h13V7l-5-5zM7.2 14.6c0 .8-.6 1.4-1.4 1.4H5v1H4v-4h1.8c.8 0 1.4.6 1.4 1.4v.2zm4.1.5c0 1-.8 1.9-1.9 1.9H8v-4h1.4c1 0 1.9.8 1.9 1.9v.2zM15 14h-2v1h1.5v1H13v1h-1v-4h3v1zm0-2H4V3h7v4h4v5zm-5.6 2H9v2h.4c.6 0 1-.4 1-1s-.5-1-1-1z"/>
						</g>
					</svg>
				</a>
			</li>
			<li id="json" data-title="<?= GetMessage('UP_HEADER_NAV_JSON') ?>" class="header__nav-item">
				<a href="#" class="header__nav-link">
					<svg  class="header__svg" width="25px" height="25px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<g id="layer1">
							<path class="header__svg-path" d="M 3 0 L 3 12 L 4 12 L 4 1 L 12 1 L 12 4 L 12 5 L 16 5 L 16 12 L 17 12 L 17 5 L 17 4 L 13 0 L 12 0 L 3 0 z M 13 1.3535156 L 15.646484 4 L 13 4 L 13 1.3535156 z M 4 13 L 4 16 L 3.9921875 16.130859 L 3.9667969 16.257812 L 3.9238281 16.382812 L 3.8652344 16.5 L 3.7929688 16.607422 L 3.7070312 16.707031 L 3.609375 16.792969 L 3.5 16.865234 L 3.3828125 16.923828 L 3.2597656 16.964844 L 3.1308594 16.992188 L 3 17 L 2.8691406 16.992188 L 2.7402344 16.964844 L 2.6171875 16.923828 L 2.5 16.865234 L 2.390625 16.792969 L 2.2929688 16.707031 L 2.2070312 16.607422 L 2.1347656 16.5 L 2.0761719 16.382812 L 2.0332031 16.257812 L 2.0078125 16.130859 L 2 16 L 1 16 L 1.0078125 16.183594 L 1.0351562 16.367188 L 1.0761719 16.546875 L 1.1347656 16.722656 L 1.2089844 16.890625 L 1.3007812 17.052734 L 1.4042969 17.205078 L 1.5214844 17.347656 L 1.6523438 17.478516 L 1.7949219 17.595703 L 1.9472656 17.699219 L 2.1074219 17.791016 L 2.2773438 17.865234 L 2.453125 17.923828 L 2.6328125 17.964844 L 2.8164062 17.992188 L 3 18 L 3.1835938 17.992188 L 3.3671875 17.964844 L 3.546875 17.923828 L 3.7226562 17.865234 L 3.8925781 17.791016 L 4.0527344 17.699219 L 4.2050781 17.595703 L 4.3476562 17.478516 L 4.4785156 17.347656 L 4.5957031 17.205078 L 4.6992188 17.052734 L 4.7910156 16.890625 L 4.8652344 16.722656 L 4.9238281 16.546875 L 4.9648438 16.367188 L 4.9921875 16.183594 L 5 16 L 5 13 L 4 13 z M 7.5 13 A 1.5 1.4999999 0 0 0 6 14.5 A 1.5 1.4999999 0 0 0 7.5 16 L 8.5 16 A 0.5 0.5 0 0 1 9 16.5 A 0.5 0.5 0 0 1 8.5 17 L 6 17 L 6 18 L 8.5 18 A 1.5 1.4999999 0 0 0 10 16.5 A 1.5 1.4999999 0 0 0 8.5 15 L 7.5 15 A 0.5 0.5 0 0 1 7 14.5 A 0.5 0.5 0 0 1 7.5 14 L 10 14 L 10 13 L 7.5 13 z M 13 13 L 12.816406 13.007812 L 12.632812 13.033203 L 12.453125 13.076172 L 12.277344 13.134766 L 12.107422 13.208984 L 11.947266 13.298828 L 11.794922 13.404297 L 11.652344 13.521484 L 11.521484 13.652344 L 11.404297 13.794922 L 11.300781 13.947266 L 11.208984 14.107422 L 11.134766 14.277344 L 11.076172 14.451172 L 11.035156 14.632812 L 11.007812 14.816406 L 11 15 L 11 16 L 11.007812 16.183594 L 11.035156 16.367188 L 11.076172 16.546875 L 11.134766 16.722656 L 11.208984 16.890625 L 11.300781 17.052734 L 11.404297 17.205078 L 11.521484 17.347656 L 11.652344 17.478516 L 11.794922 17.595703 L 11.947266 17.699219 L 12.107422 17.791016 L 12.277344 17.865234 L 12.453125 17.923828 L 12.632812 17.964844 L 12.816406 17.992188 L 13 18 L 13.183594 17.992188 L 13.367188 17.964844 L 13.546875 17.923828 L 13.722656 17.865234 L 13.892578 17.791016 L 14.052734 17.699219 L 14.205078 17.595703 L 14.347656 17.478516 L 14.478516 17.347656 L 14.595703 17.205078 L 14.699219 17.052734 L 14.791016 16.890625 L 14.865234 16.722656 L 14.923828 16.546875 L 14.964844 16.367188 L 14.992188 16.183594 L 15 16 L 15 15 L 14.992188 14.816406 L 14.964844 14.632812 L 14.923828 14.451172 L 14.865234 14.277344 L 14.791016 14.107422 L 14.699219 13.947266 L 14.595703 13.794922 L 14.478516 13.652344 L 14.347656 13.521484 L 14.205078 13.404297 L 14.052734 13.298828 L 13.892578 13.208984 L 13.722656 13.134766 L 13.546875 13.076172 L 13.367188 13.033203 L 13.183594 13.007812 L 13 13 z M 16.513672 13 A 0.50005 0.50005 0 0 0 16 13.5 L 16 18 L 17 18 L 17 15.001953 L 19.099609 17.800781 A 0.50005 0.50005 0 0 0 20 17.5 L 20 13 L 19 13 L 19 15.998047 L 16.900391 13.199219 A 0.50005 0.50005 0 0 0 16.513672 13 z M 13 14 L 13.130859 14.007812 L 13.259766 14.033203 L 13.382812 14.076172 L 13.5 14.134766 L 13.609375 14.207031 L 13.707031 14.292969 L 13.792969 14.390625 L 13.865234 14.5 L 13.923828 14.617188 L 13.966797 14.740234 L 13.992188 14.869141 L 14 15 L 14 16 L 13.992188 16.130859 L 13.966797 16.257812 L 13.923828 16.382812 L 13.865234 16.5 L 13.792969 16.607422 L 13.707031 16.707031 L 13.609375 16.792969 L 13.5 16.865234 L 13.382812 16.923828 L 13.259766 16.964844 L 13.130859 16.992188 L 13 17 L 12.869141 16.992188 L 12.740234 16.964844 L 12.617188 16.923828 L 12.5 16.865234 L 12.390625 16.792969 L 12.292969 16.707031 L 12.207031 16.607422 L 12.134766 16.5 L 12.076172 16.382812 L 12.033203 16.257812 L 12.007812 16.130859 L 12 16 L 12 15 L 12.007812 14.869141 L 12.033203 14.740234 L 12.076172 14.617188 L 12.134766 14.5 L 12.207031 14.390625 L 12.292969 14.292969 L 12.390625 14.207031 L 12.5 14.134766 L 12.617188 14.076172 L 12.740234 14.033203 L 12.869141 14.007812 L 13 14 z M 3 19 L 3 20 L 17 20 L 17 19 L 16 19 L 4 19 L 3 19 z " fill="#ffff" stroke-width="4px"/>
						</g>
					</svg>
				</a>
			</li>

			<li data-title="<?= GetMessage('UP_HEADER_NAV_STATISTIC') ?>" class="header__nav-item">
				<a href="/statistics/" class="header__nav-link">
					<svg class="header__svg" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<line class="a" x1="2" x2="22" y1="20" y2="20"/>
						<path fill="#ffff" class="a header__svg-path" d="M5,20V8.2A.2.2,0,0,1,5.2,8H7.8a.2.2,0,0,1,.2.2V20"/>
						<path fill="#ffff" class="a header__svg-path" d="M11,20V4.26667C11,4.11939,11.08954,4,11.2,4h2.6c.11046,0,.2.11939.2.26667V20"/>
						<path fill="#ffff" class="a header__svg-path" d="M17,20V11.15c0-.08284.08954-.15.2-.15h2.6c.11046,0,.2.06716.2.15V20"/>
					</svg>
				</a>
			</li>
			<li data-title="<?= GetMessage('UP_HEADER_NAV_BUY_SUBSCRIPTION') ?>" class="header__nav-item">
				<a href="/subscriptions/" class="header__nav-link">
					<svg class="header__svg" width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path class="header__svg-path" fill="#ffff" d="M14,6a7.17,7.17,0,0,0-1,.08A4.49,4.49,0,0,0,4,6.5V7A2,2,0,0,0,2,9v9a1.94,1.94,0,0,0,2,2H8.73A8,8,0,1,0,14,6ZM6,6.5a2.51,2.51,0,0,1,5-.24V7H6ZM14,20a6,6,0,1,1,6-6A6,6,0,0,1,14,20Zm-1.5-8v1h4a1,1,0,0,1,1,1v3a1,1,0,0,1-1,1H15v1H13V18H10.5V16h5V15h-4a1,1,0,0,1-1-1V11a1,1,0,0,1,1-1H13V9h2v1h2.5v2Z"/>
						<rect width="24" height="24" fill="none"/>
					</svg>
				</a>
			</li>
			<?php if ($USER->IsAdmin()): ?>
			<li data-title="<?= GetMessage('UP_HEADER_NAV_ADMIN') ?>" class="header__nav-item">
				<a id="admin" href="/admin/" class="header__nav-link">
					<svg class="header__svg" fill="#fff" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						 viewBox="0 0 474.565 474.565" xml:space="preserve">
					<g>
						<path class="header__svg-path-stroke" d="M255.204,102.3c-0.606-11.321-12.176-9.395-23.465-9.395C240.078,95.126,247.967,98.216,255.204,102.3z"/>
						<path class="header__svg-path-stroke" d="M134.524,73.928c-43.825,0-63.997,55.471-28.963,83.37c11.943-31.89,35.718-54.788,66.886-63.826
							C163.921,81.685,150.146,73.928,134.524,73.928z"/>
						<path class="header__svg-path-stroke" d="M43.987,148.617c1.786,5.731,4.1,11.229,6.849,16.438L36.44,179.459c-3.866,3.866-3.866,10.141,0,14.015l25.375,25.383
							c1.848,1.848,4.38,2.888,7.019,2.888c2.61,0,5.125-1.04,7.005-2.888l14.38-14.404c2.158,1.142,4.55,1.842,6.785,2.827
							c0-0.164-0.016-0.334-0.016-0.498c0-11.771,1.352-22.875,3.759-33.302c-17.362-11.174-28.947-30.57-28.947-52.715
							c0-34.592,28.139-62.739,62.723-62.739c23.418,0,43.637,13.037,54.43,32.084c11.523-1.429,22.347-1.429,35.376,1.033
							c-1.676-5.07-3.648-10.032-6.118-14.683l14.396-14.411c1.878-1.856,2.918-4.38,2.918-7.004c0-2.625-1.04-5.148-2.918-7.004
							l-25.361-25.367c-1.94-1.941-4.472-2.904-7.003-2.904c-2.532,0-5.063,0.963-6.989,2.904l-14.442,14.411
							c-5.217-2.764-10.699-5.078-16.444-6.825V9.9c0-5.466-4.411-9.9-9.893-9.9h-35.888c-5.451,0-9.909,4.434-9.909,9.9v20.359
							c-5.73,1.747-11.213,4.061-16.446,6.825L75.839,22.689c-1.942-1.941-4.473-2.904-7.005-2.904c-2.531,0-5.077,0.963-7.003,2.896
							L36.44,48.048c-1.848,1.864-2.888,4.379-2.888,7.012c0,2.632,1.04,5.148,2.888,7.004l14.396,14.403
							c-2.75,5.218-5.063,10.708-6.817,16.438H23.675c-5.482,0-9.909,4.441-9.909,9.915v35.889c0,5.458,4.427,9.908,9.909,9.908H43.987z"
						/>
						<path class="header__svg-path-stroke" d="M354.871,340.654c15.872-8.705,26.773-25.367,26.773-44.703c0-28.217-22.967-51.168-51.184-51.168
							c-9.923,0-19.118,2.966-26.975,7.873c-4.705,18.728-12.113,36.642-21.803,52.202C309.152,310.022,334.357,322.531,354.871,340.654z
							"/>
						<path class="header__svg-path-stroke" d="M460.782,276.588c0-5.909-4.799-10.693-10.685-10.693H428.14c-1.896-6.189-4.411-12.121-7.393-17.75l15.544-15.544
							c2.02-2.004,3.137-4.721,3.137-7.555c0-2.835-1.118-5.553-3.137-7.563l-27.363-27.371c-2.08-2.09-4.829-3.138-7.561-3.138
							c-2.734,0-5.467,1.048-7.547,3.138l-15.576,15.552c-5.623-2.982-11.539-5.481-17.751-7.369v-21.958
							c0-5.901-4.768-10.685-10.669-10.685H311.11c-2.594,0-4.877,1.04-6.739,2.578c3.26,11.895,5.046,24.793,5.046,38.552
							c0,8.735-0.682,17.604-1.956,26.423c7.205-2.656,14.876-4.324,22.999-4.324c36.99,0,67.086,30.089,67.086,67.07
							c0,23.637-12.345,44.353-30.872,56.303c13.48,14.784,24.195,32.324,31.168,51.976c1.148,0.396,2.344,0.684,3.54,0.684
							c2.733,0,5.467-1.04,7.563-3.13l27.379-27.371c2.004-2.004,3.106-4.721,3.106-7.555s-1.102-5.551-3.106-7.563l-15.576-15.552
							c2.982-5.621,5.497-11.555,7.393-17.75h21.957c2.826,0,5.575-1.118,7.563-3.138c2.004-1.996,3.138-4.72,3.138-7.555
							L460.782,276.588z"/>
						<path class="header__svg-path-stroke" d="M376.038,413.906c-16.602-48.848-60.471-82.445-111.113-87.018c-16.958,17.958-37.954,29.351-61.731,29.351
							c-23.759,0-44.771-11.392-61.713-29.351c-50.672,4.573-94.543,38.17-111.145,87.026l-9.177,27.013
							c-2.625,7.773-1.368,16.338,3.416,23.007c4.783,6.671,12.486,10.631,20.685,10.631h315.853c8.215,0,15.918-3.96,20.702-10.631
							c4.767-6.669,6.041-15.234,3.4-23.007L376.038,413.906z"/>
						<path class="header__svg-path-stroke" d="M120.842,206.782c0,60.589,36.883,125.603,82.352,125.603c45.487,0,82.368-65.014,82.368-125.603
							C285.563,81.188,120.842,80.939,120.842,206.782z"/>
					</g>
					</svg>
				</a>
			</li>
			<?php endif; ?>
			<li data-title="<?= GetMessage('UP_HEADER_NAV_SEARCH') ?>" class="header__nav-item">
				<a id="search" href="/search/" class="header__nav-link">
					<svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						 width="30px" height="30px" viewBox="0 0 34.083 34.083"
						 xml:space="preserve">
						<g>
							<path d="M12.688,26.479C11.707,27.458,10.4,28,9.008,28c-1.392,0-2.696-0.539-3.678-1.521c-0.231-0.231-0.437-0.484-0.617-0.752
								v-2.146c0-1.903,1.64-4.245,3.646-5.196l1.477-0.701c1.075,0.17,2.068,0.656,2.852,1.439C14.714,21.15,14.714,24.45,12.688,26.479z
								 M18.444,16.193c3.921,0,7.096-4.877,7.096-9.347C25.54,2.373,22.365,0,18.444,0c-3.918,0-7.094,2.373-7.094,6.846
								C11.354,11.316,14.526,16.193,18.444,16.193z M28.533,18.385l-4.603-2.188l-3.035,6.312l-1.504-4.087
								c-0.313,0.061-0.621,0.139-0.946,0.139c-0.324,0-0.636-0.078-0.947-0.139l-0.86,2.335c0.541,2.029,0.277,4.242-0.859,6.125
								c0.17,0.093,0.328,0.207,0.467,0.347l1.48,1.48H32.18v-5.124C32.18,21.678,30.538,19.336,28.533,18.385z M19.94,32.055
								c0.225,0.227,0.348,0.522,0.348,0.84c0,0.316-0.123,0.614-0.348,0.84c-0.227,0.226-0.522,0.349-0.84,0.349
								c-0.316,0-0.615-0.123-0.84-0.349l-4.262-4.262c-0.161-0.162-0.271-0.367-0.32-0.596l-0.123-0.588l-0.494,0.343
								c-1.193,0.831-2.6,1.271-4.063,1.271c-1.896,0-3.679-0.735-5.017-2.073c-2.771-2.771-2.771-7.282,0-10.053
								c1.341-1.342,3.125-2.079,5.025-2.079c1.901,0,3.686,0.737,5.026,2.079c2.435,2.434,2.772,6.251,0.805,9.08l-0.344,0.494
								l0.589,0.123c0.229,0.049,0.434,0.158,0.596,0.32L19.94,32.055z M13.253,18.557c-1.133-1.133-2.64-1.756-4.245-1.756
								c-1.604,0-3.112,0.623-4.243,1.756c-2.342,2.34-2.342,6.147,0,8.488c1.131,1.132,2.64,1.756,4.243,1.756
								c1.605,0,3.112-0.624,4.245-1.756C15.593,24.704,15.593,20.896,13.253,18.557z"/>
						</g>
					</svg>
				</a>
			</li>
			<li data-title="<?= GetMessage('UP_HEADER_NAV_MY_MESSAGES') ?>" class="header__nav-item">
				<a id="search" href="/chat/" class="header__nav-link">
					<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.25">
						<defs>
							<style>.cls-1{fill-rule:evenodd;}</style>
						</defs>
						<path fill="white" class="cls-1"
							  d="M51.16,93.74c13,12.49,31.27,16.27,49.59,8.46l15.37,6L111,96.13c17.08-13.68,14-32.48,1.44-45.3a44.38,44.38,0,0,1-4.88,13.92A51.45,51.45,0,0,1,93.45,80.84a62.51,62.51,0,0,1-19.73,10,71.07,71.07,0,0,1-22.56,2.92ZM74.74,36.13a6.68,6.68,0,1,1-6.68,6.68,6.68,6.68,0,0,1,6.68-6.68Zm-44.15,0a6.68,6.68,0,1,1-6.68,6.68,6.68,6.68,0,0,1,6.68-6.68Zm22.08,0A6.68,6.68,0,1,1,46,42.81a6.68,6.68,0,0,1,6.68-6.68ZM54,0H54c14.42.44,27.35,5.56,36.6,13.49,9.41,8.07,15,19,14.7,31v0c-.36,12-6.66,22.61-16.55,30.11C79,82.05,65.8,86.4,51.38,86a64.68,64.68,0,0,1-11.67-1.4,61,61,0,0,1-10-3.07L7.15,90.37l7.54-17.92A43.85,43.85,0,0,1,4,59,36.2,36.2,0,0,1,0,41.46c.36-12,6.66-22.61,16.55-30.12C26.3,4,39.53-.4,54,0ZM53.86,5.2h0C40.59,4.82,28.52,8.77,19.69,15.46,11,22,5.5,31.28,5.19,41.6A31.2,31.2,0,0,0,8.61,56.67a39.31,39.31,0,0,0,10.81,13L21,70.87,16.68,81.05l13.08-5.14,1,.42a55.59,55.59,0,0,0,10.05,3.18A59,59,0,0,0,51.52,80.8c13.22.39,25.29-3.56,34.12-10.26C94.31,64,99.83,54.73,100.15,44.4v0c.3-10.32-4.65-19.85-12.9-26.92C78.85,10.26,67.06,5.6,53.87,5.2Z"/>
					</svg>
				</a>
			</li>
			<li data-title="<?= GetMessage('UP_HEADER_NAV_LOGOUT') ?>" class="header__nav-item">
				<a id="logout" href="/?logout=yes&<?=bitrix_sessid_get()?>" class="header__nav-link">
					<svg class="header__svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="Interface / Log_Out">
							<path class="header__svg-path-stroke" id="Vector" d="M12 15L15 12M15 12L12 9M15 12H4M9 7.24859V7.2002C9 6.08009 9 5.51962 9.21799 5.0918C9.40973 4.71547 9.71547 4.40973 10.0918 4.21799C10.5196 4 11.0801 4 12.2002 4H16.8002C17.9203 4 18.4796 4 18.9074 4.21799C19.2837 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.07899 20 7.19691V16.8036C20 17.9215 20 18.4805 19.7822 18.9079C19.5905 19.2842 19.2837 19.5905 18.9074 19.7822C18.48 20 17.921 20 16.8031 20H12.1969C11.079 20 10.5192 20 10.0918 19.7822C9.71547 19.5905 9.40973 19.2839 9.21799 18.9076C9 18.4798 9 17.9201 9 16.8V16.75" stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</g>
					</svg>
				</a>
			</li>
		</ul>
	</nav>
	<div class="my-container header__main">
		<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a class="navbar-item has-text-weight-semibold is-size-4 logo" href="/">
					My Family 24
				</a>

				<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>

			<div id="navbarBasicExample" class="navbar-menu">
				<div class="navbar-start">

					<a class="navbar-item header_item">
						<?= GetMessage('UP_HEADER_DOCUMENTATION') ?>
					</a>

					<?php if (str_contains($currentUrl, '/tree/') === false):?>
						<div class="navbar-item has-dropdown is-hoverable">
								<a class="navbar-item header_item" href="mailto:familyTreeTechnicalSupport@gmail.com">
									<?= GetMessage('UP_HEADER_REPORT_ISSUE') ?>
								</a>

						</div>
					<?php endif; ?>
					<?php if (str_contains($currentUrl, '/tree/')):?>
						<div class="navbar-item has-dropdown is-hoverable">
							<a id = "navbar-purchases" class="navbar-link header_item">
								<?= GetMessage('UP_HEADER_SKINS') ?>
							</a>
							<div class="navbar-dropdown">
									<?= $APPLICATION->IncludeComponent("up:tree.purchases", "", []);?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="navbar-end">
					<?php if (str_contains($currentUrl, '/tree/')):?>
						<div class="btn-container">
							<label class="switch btn-color-mode-switch">
								<input type="checkbox" name="color_mode" id="color_mode">
								<label for="color_mode" data-on="Dark" data-off="Light" class="btn-color-mode-switch-inner"></label>
							</label>
						</div>
					<?php endif; ?>
					<div class="navbar-item">
						<div class="buttons">
							<div class="header__icon">
								<span class="header__icon-name">
									<a href="/account/" class="name__link" style="display:flex; align-items: baseline; gap: 5pt">
										<img id="headerIcon" src="<?= UserService::getUserFileName()['FILE_NAME'] ?>" alt="My profile">
										<?= htmlspecialcharsEx($USER->GetFirstName()) . ' ' .  htmlspecialcharsEx($USER->GetLastName())?: GetMessage('UP_HEADER_ICON_NAME') ?>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
	</div>
</header>

