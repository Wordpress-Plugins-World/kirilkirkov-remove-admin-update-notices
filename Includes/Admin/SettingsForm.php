<div id="kirilkirkov" class="wrap">
    <form method="post" action="options.php">
        <div class="header p-4 flex items-center space-between">
            <div class="flex items-center">
                <svg version="1.1" class="mr-4" height="40px" fill="#1e53b4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"><g><path d="M10,361.6v276.8c0,30.5,24.9,55.4,55.4,55.4h138.4V306.2H65.4C34.9,306.2,10,331.1,10,361.6L10,361.6z M480.6,140.1L259.2,270.2v462.3l221.5,130.1c30.5,0,55.4-24.9,55.4-55.4v-609C536,165,511.1,140.1,480.6,140.1L480.6,140.1z"/><path d="M702.1,906.9c-16.6,0-33.2-11.1-38.8-27.7c-8.3-22.1,2.8-44.3,24.9-52.6C823.9,774.1,909.7,646.7,909.7,500c0-146.7-85.8-274.1-221.5-326.7c-22.1-8.3-33.2-33.2-24.9-52.6c8.3-22.1,33.2-33.2,52.6-24.9C882,159.5,990,320,990,500c0,179.9-108,337.7-274.1,404.2C713.2,906.9,707.6,906.9,702.1,906.9L702.1,906.9z M646.7,727c-16.6,0-33.2-11.1-38.8-30.5c-5.5-22.1,5.5-44.3,27.7-52.6c63.7-19.4,108-77.5,108-144c0-66.4-44.3-127.3-108-144c-22.1-5.5-33.2-30.5-27.7-52.6c5.5-22.1,30.5-33.2,52.6-27.7c96.9,27.7,166.1,121.8,166.1,224.2c0,105.2-66.4,193.8-166.1,224.2C655,724.2,652.3,727,646.7,727L646.7,727z"/></g></svg>
                <h2><?php _e( 'Remove Admin Plugins Notices' ); ?> — <?php _e( 'Page: Settings', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ) ?></h2>    
            </div>
            
            <button type="submit" class="button-primary"><?php _e( 'Save' ) ?></button>
        </div>
    
        <div class="flex flex-wrap">
            <div class="w-full md:w-3/4">
                <div class="section-header p-4">
                    <strong><?php _e( 'Remove Adminitration Notices', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ) ?></strong>
                    <p>
                        <?php _e('
                            Do you know the situation, when some plugin offers you to update to premium, 
                            to collect technical data and shows many annoying notices or wants you to 
                            make update? You are close these notices every now and again but they newly 
                            appears and interfere your work with WordPress. 
                            With this plugin you can easily remove them!
                        ', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ) ?>
                    </p>
                </div>

                <div class="section-body">
                    <div class="p-4">
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row" class="align-middle">
                                    <div class="th-div">
                                        <span class="mr-5"><?php _e( 'Hide notices', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ); ?></span>
                                    </div>
                                </th>
                                <td colspan="2">
                                    <label>
                                        <input type="hidden" name="<?php echo KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX; ?>hide_admin_notices" value="0">
                                        <input type="checkbox" name="<?php echo KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX; ?>hide_admin_notices" value="1" <?php echo get_option(KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX.'hide_admin_notices') && get_option(KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_PREFIX.'hide_admin_notices') == '1' ? 'checked' : ''; ?> />
                                        <?php _e( 'Hidden', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ); ?>
                                    </label>
                                </td>
                            </tr>

                            <input type="hidden" name="action" value="update" />
                            <input type="hidden" name="page_options" value="<?php echo KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_GROUP; ?>" />

                            <?php settings_fields(KIRILKIRKOV_REM_ADM_NOTICES_INPUTS_GROUP); ?>
                        </table>
                        <div class="flex justify-end">
                            <button type="submit" class="button-primary"><?php _e( 'Save' ) ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/4 ad-col">
                <div class="p-4">
                    <div class="ad-box p-4 flex flex-wrap items-center justify-between">
                        <img src="<?php echo plugins_url('GitHub-Mark-64px.png', __FILE__ ); ?>" width="30px" height="30px" alt="GitHub">
                        <a href="https://github.com/Wordpress-Plugins-World" class="accent-button" target="_blank"><?php _e( 'Find Us', KIRILKIRKOV_REM_ADM_NOTICES_TEXT_DOMAIN ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>