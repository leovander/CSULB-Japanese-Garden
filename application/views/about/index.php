<?php
/**
 * Context:      About Index page
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Beau Squires
 * Date:         3/22/14
 * Time:         1:49 PM
 */
?>

<section class="small-sidenav">
    <section class="left-panel-image">
        <figure id="najgi-logo">
            <img src="<?php echo site_url('assets/images/najgi_logo.png');?>" alt="North American Japanese Garden Association Logo"/>
            <figcaption>The Earl Burns Miller Japanese Garden is a member of The North American Japanese Garden Association</figcaption>
        </figure>


        <figure>
            <img src="<?php echo site_url('assets/images/about_us_index.jpg');?>" alt="View of the dock and the pond inside the Japanese Garden"/>
        </figure>

    </section>

    <section class="right-panel">
        <h1>About Us</h1>
        <p>
            Dedicated in April 1981, the garden was built through the generosity of Mrs. Loraine Miller Collins. The
            contribution was made in memory of her late husband, Earl Burns Miller, for whom the 1.3 acre plot is named.
            Following three years of planning, in cooperation with California State University Long Beach, Mrs. Collins
            selected Long Beach landscape architect Edward R. Lovell to design the garden. In preparation for the
            project, Mr. Lovell visited similar gardens in Japan and in the United States.
        </p>

        <p>
            The resulting garden reflects the university's continuing interest in international education, and the
            university community is delighted to have you share in this educational, cultural, and aesthetic resource.
        </p>

        <section id="garden-hours">
            <?php
            $this->load->view('global/operating_hours_table', $data['daily_hours'] = $daily_hours);
            $this->load->view('global/closures', $data['closures'] = $closures);
            ?>
        </section>

        <h2>Thank you for visiting</h2>

        <p>
            Please take a few minutes to rate our site. Your suggestions are appreciated. <a href="<?php echo site_url('index.php/about/rate_our_website');?>">Rate our website</a>.
        </p>
    </section>

