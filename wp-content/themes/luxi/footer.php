    <div class="clearfix"></div>

        </div>

        <hr>

        <!-- Start of Footer -->
            <footer class="site-footer">

                <?php if (( is_active_sidebar( 'footer-area-1' )) || ( is_active_sidebar( 'footer-area-2' )) || ( is_active_sidebar( 'footer-area-3' )) || ( is_active_sidebar( 'footer-area-4' ))) { ?>

              <div class="footer-row top">
                <div class="footer-block left">
                  <?php if ( is_active_sidebar( 'footer-area-1' ) ) {
                      dynamic_sidebar( 'footer-area-1' );
                    } ?>
                </div>
                <div class="footer-block middle-left">
                  <?php if ( is_active_sidebar( 'footer-area-2' ) ) {
                      dynamic_sidebar( 'footer-area-2' );
                    } ?>
                </div>
                <div class="footer-block middle-right">
                  <?php if ( is_active_sidebar( 'footer-area-3' ) ) {
                      dynamic_sidebar( 'footer-area-3' );
                    } ?>
                </div>
                <div class="footer-block right">
                  <?php if ( is_active_sidebar( 'footer-area-4' ) ) {
                      dynamic_sidebar( 'footer-area-4' );
                    } ?>
                </div>
              </div>

              <?php } ?>

              <div class="clearfix"></div>
              <?php if (( is_active_sidebar( 'footer-area-5' )) || ( is_active_sidebar( 'footer-area-6' )) || ( is_active_sidebar( 'footer-area-7' )) ) { ?>

              <hr>

              <div class="footer-row bottom">
                <div class="footer-block left">
                  <?php if ( is_active_sidebar( 'footer-area-5' ) ) {
                      dynamic_sidebar( 'footer-area-5' );
                    } ?>
                </div>
                <div class="footer-block middle">
                  <?php if ( is_active_sidebar( 'footer-area-6' ) ) {
                      dynamic_sidebar( 'footer-area-6' );
                    } ?>
                </div>
                <div class="footer-block right">
                  <?php if ( is_active_sidebar( 'footer-area-7' ) ) {
                      dynamic_sidebar( 'footer-area-7' );
                    } ?>
                </div>
              </div>

              <?php } ?>

            </footer>

    <?php wp_footer(); ?>

</body>
</html>
