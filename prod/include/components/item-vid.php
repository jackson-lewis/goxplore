<?php

$name_url = str_replace(" ","-", $name );
$time = str_replace("00:","", $time );

if ( $time[0] == 0 ) {
	$time = ltrim($time, '0');
}

if ( $type == 'destination' ) {
	$folder = 'hero';
} else {
	$folder = 'experiences';
}

?>

<div class="item-vid">
	<?php if ( $page ) { ?>
	<h3><?php echo $i; ?></h3>
	<?php } ?>
	<a href="player.php?id=<?php echo $id; ?>">
	    <h4><?php echo $name; ?></h4>
	    <div class="thumbnail">
	        <img src="assets/destinations/<?php echo $destination . '/' . $folder . '/' . $name_url; ?>.jpg">
	    </div>
	</a>
    <p data-item-text="time"><?php echo $time; ?></p>
    <a href="player.php?id=<?php echo $id . '&type=' . $type ?>" class="button-blue">watch</a>
</div>