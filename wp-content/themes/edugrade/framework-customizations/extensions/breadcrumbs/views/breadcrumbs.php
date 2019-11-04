<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

	if ( ! empty( $items ) ) : ?>
		<ul class="breadcrumb">
			<?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
				<?php if ( $i == ( count( $items ) - 1 ) ) : ?>
					<li class="last-item"><?php echo esc_attr($items[ $i ]['name']); ?></li>
				<?php elseif ( $i == 0 ) : ?>
					<li class="first-item">
					<?php if( isset( $items[ $i ]['url'] ) ) : ?>
						<a href="<?php echo esc_url($items[ $i ]['url']); ?>"><i class="fas fa-home"></i> <?php echo esc_attr__('Home','edugrade'); ?></a></li>
					<?php else : echo esc_attr($items[ $i ]['name']); endif ?>
					 
				<?php
				else : ?>
					<li class="<?php echo( esc_attr($i) - 1 ) ?>-item">
						<?php if( isset( $items[ $i ]['url'] ) ) : ?>
							<a href="<?php echo esc_url($items[ $i ]['url']) ?>"><?php echo esc_attr($items[ $i ]['name']); ?></a></li>
						<?php else : echo esc_attr($items[ $i ]['name']); endif ?>

				<?php endif ?>
			<?php endfor ?>
		</ul>
	<?php endif ?>