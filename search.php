<?php
// Connect to your database and perform the search query
// Example:
// $query = $_GET['query'];
// Perform your database query based on $query
// Fetch results from the database and format them as HTML

// For demonstration purposes, let's just return a dummy result
$searchResults = '<p>Dummy search result 1</p><p>Dummy search result 2</p>';

// Output the search results
echo $searchResults;
?>
		<?php
// Perform the search based on the query received from AJAX
$query = $_GET['query'];

// Simulated search results (replace this with your actual search logic)
$searchResults = '
    <!-- item-->
    <div class="dropdown-header noti-title">
        <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
    </div>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="uil-notes font-16 me-1"></i>
        <span>Analytics Report</span>
    </a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="uil-life-ring font-16 me-1"></i>
        <span>How can I help you?</span>
    </a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="uil-cog font-16 me-1"></i>
        <span>User profile settings</span>
    </a>
    <!-- item-->
    <div class="dropdown-header noti-title">
        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
    </div>';

// Output the search results
echo $searchResults;
?>
