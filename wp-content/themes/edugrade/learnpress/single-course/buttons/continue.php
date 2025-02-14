<?php
/**
 * Template for displaying Continue button in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/buttons/continue.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$user = LP_Global::user();
?>
<li class="enrollment-button"> 
<form name="continue-course" class="continue-course form-button lp-form" method="post"
      action="<?php echo esc_url($user->get_current_item( get_the_ID(), true )); ?>">

    <button type="submit" class="lp-button button"><?php echo esc_attr__( 'Continue', 'edugrade' ); ?></button>

</form>
</li>