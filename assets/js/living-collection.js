/*
 * Context:      jQuery for The Living Collection Tree List
 * Team members: Beau Squires, Israel Torres, Gyngai Ung, Kun Wei
 * Author #1:    Gyngai Ung
 * Date:         5/04/14 6pm
 */

$(document).ready(function() {

    if ( $(window).width() < 680) {
        $('#treeListTable').dataTable( {
            "pagingType": "simple",

            "columnDefs": [
                {
                    "targets": [ 3 ],
                    "visible": false
                }
            ]
        } );
    } else {
        $('#treeListTable').dataTable( {
            "pagingType": "simple"
        } );

    }


} );