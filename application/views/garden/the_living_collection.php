<?php
/*
 * Context:      The Living Collection and Tree List
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Kun Wei
 * Author #2:    Gyngai Ung
 * Date:         4/21/14
 */
?>

<section class="no-sidenav">
    <section>
        <h1>The Living Collection</h1>

        <figure id="right-pic">
            <img src="<?php echo site_url('assets/images/lc_1.png');?>" alt="A tree with yellow leaf inside the Japanese Garden"/>
        </figure>
        <p>The Earl Burns Miller Japanese Garden’s (EBMJG) tree collection is comprised of living
            organisms. Like a museum where juxtaposed exhibits within a given space create a narrative,
            each tree in our collection plays a role within the Garden’s composition, or design intent
            drafted in 1981 by Edward Lovell, ASLA. Signature trees such as the Japanese black pines,
            Japanese maples, and ginkgos are essential components to any Japanese garden. Specimen
            trees like the Chinese flame tree, Hong Kong orchid, plum, pink cloud cherry, evergreen
            pears, and saucer magnolias add to the overall desired aesthetic of the EBMJG. Groves of
            fern pines, Canary Island pines, sweet gums, and Aleppo pines make up the Garden’s perimeter,
            form a back-drop and complete the visitor’s transportation from a busy urban college campus
            to a serene refuge for all to enjoy.
        </p>

        <figure id="left-pic">
            <img src="<?php echo site_url('assets/images/lc_2.jpg');?>" alt="A tree inside the Japanese Garden"/>
        </figure>

        <p>The collection of trees at the EBMJG provides aesthetic enjoyment and increases the quality of
            life for the University and the greater Long Beach community. Feel free to bring the map and
            tree list next time you visit to identify the variety of beautiful trees. Watch them grow and
            change over the seasons.
        </p>

        <p>In 2008, the following Japanese garden tree species map was produced as part of our Detailed
            Conservation Survey funded by the Institute of Museums and Library Services and the Miller
            Foundation. Each tree was given a unique coordinate, which serves as its individual identity.
            A profile is kept on each tree indicating its species, health, and maintenance profile. To
            have these identifying coordinates readily available, tree tags were attached to our trees
            in the Garden. However, upon your next visit you won’t even notice these tags and observe that
            the garden is relatively free of signage or other visual distractions to preserve the visitor’s
            aesthetic experience. Enough of our background trees contain these markers to provide staff with
            reference points in order to identify the locations of the entire collection while on the ground.
            Increased knowledge about the Japanese Garden’s tree collection has equipped staff with more
            resources for planning the Garden’s healthy future.
        </p>
    </section>

    <figure id="treemap">
        <figcaption>Tree Species Map</figcaption>
        <img src="<?php echo site_url('assets/images/living_collection/Tree_Species_Map.png'); ?>"
             alt="Japanese Garden Tree Species Map"
             title="Japanese Garden Tree Species Map"/>
    </figure>

    <table id="treeListTable">
        <thead>
        <tr>
            <th>Map #</th>
            <th>Common Name</th>
            <th>Botanical Name</th>
            <th>Status</th>
            <th>Notes</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($tree_items as $trees_item):
            ?>
            <tr>
                <td><?php echo $trees_item['map_num'] ?></td>
                <td><?php echo $trees_item['common_name'] ?></td>
                <td><?php echo $trees_item['botanical_name'] ?></td>
                <td><?php echo $trees_item['status'] ?></td>
                <td><?php echo $trees_item['notes'] ?></td>
            </tr>
        <?php
        endforeach
        ?>

        </tbody>
    </table>

</section>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//cdn.datatables.net/1.10.0-rc.1/js/jquery.dataTables.js"></script>
<script src="<? echo site_url('assets/js/living-collection.js')?>" type="text/javascript"></script>