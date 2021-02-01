<?php
/**
 * Template part for displaying a message that posts cannot be found
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package crdtheme
 */
?>
<section class="main-column my-8">
	<h2>Aucun résultat</h2>

	<?php if ( is_search() ) : ?>

		<p>Désolé, mais rien ne correspond à vos termes de recherche. Veuillez réessayer avec d'autres mots-clés.</p>
		
	<?php else : ?>

		<p>Il semble que nous ne trouvons pas ce que vous cherchez. Peut-être qu'une recherche peut vous aider.</p>
	
	<?php endif; ?>
</section>

