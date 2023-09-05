<?php
class InfoDao
{
    private MysqlAdapter $mysqlAdapter;
    public function __construct(MysqlAdapter $mysqlAdapter)
    {
        $this->mysqlAdapter = $mysqlAdapter;
    }

    public function getLastId()
    {
        return $this->mysqlAdapter->getLastId();
    }

    public function select()
    {
        $result = $this->mysqlAdapter->query("SELECT * FROM info INNER JOIN themes ON info.theme_id = themes.theme_id");
        $row = mysqli_fetch_assoc($result);
        return $this->schematize($row);
    }

    public function update(
        string $info_name,
        string $info_country,
        string $info_state,
        string $info_city,
        string $info_whatsapp,
        string $info_location,
        string $info_desc,
        string $info_mision,
        string $info_vision,
        string $info_logo,
        string $info_icon,
        string $info_fb_app_id,
        string $info_fb_app_secret,
        string $info_fb_page_id,
        string $info_fb_access_token,
        string $info_home_title,
        string $info_home_subtitle,
        string $info_services_title,
        string $info_services_subtitle,
        string $info_services_image,
        string $info_portfolio_title,
        string $info_portfolio_subtitle,
        string $info_portfolio_image,
        string $info_about_title,
        string $info_about_subtitle,
        string $info_about_image,
        string $theme_id
    ) {
        $info_name = addSlashes($info_name);
        $info_country = addSlashes($info_country);
        $info_state = addSlashes($info_state);
        $info_city = addSlashes($info_city);
        $info_location = addSlashes($info_location);
        $info_desc = addSlashes($info_desc);
        $info_mision = addSlashes($info_mision);
        $info_vision = addSlashes($info_vision);
        $info_home_title = addSlashes($info_home_title);
        $info_home_subtitle = addSlashes($info_home_subtitle);
        $info_services_title = addSlashes($info_services_title);
        $info_services_subtitle = addSlashes($info_services_subtitle);
        $info_portfolio_title = addSlashes($info_portfolio_title);
        $info_portfolio_subtitle = addSlashes($info_portfolio_subtitle);
        $info_about_title = addSlashes($info_about_title);
        $info_about_subtitle = addSlashes($info_about_subtitle);
        $info_last = date('Y-m-d H:i:s');
        return $this->mysqlAdapter->query("
            UPDATE info SET 
                info_name = '$info_name',
                info_country = '$info_country',
                info_state = '$info_state',
                info_city = '$info_city',
                info_whatsapp = '$info_whatsapp',
                info_location = '$info_location',
                info_desc = '$info_desc',
                info_mision = '$info_mision',
                info_vision = '$info_vision',
                info_logo = '$info_logo',
                info_icon = '$info_icon',
                info_fb_app_id = '$info_fb_app_id',
                info_fb_app_secret = '$info_fb_app_secret',
                info_fb_page_id = '$info_fb_page_id',
                info_fb_access_token = '$info_fb_access_token',
                info_home_title = '$info_home_title',
                info_home_subtitle = '$info_home_subtitle',
                info_services_title = '$info_services_title',
                info_services_subtitle = '$info_services_subtitle',
                info_services_image = '$info_services_image',
                info_portfolio_title = '$info_portfolio_title',
                info_portfolio_subtitle = '$info_portfolio_subtitle',
                info_portfolio_image = '$info_portfolio_image',
                info_about_title = '$info_about_title',
                info_about_subtitle = '$info_about_subtitle',
                info_about_image = '$info_about_image',
                theme_id = '$theme_id',
                info_last = '$info_last'
        ");
    }

    public function updateFacebookAccessToken(
        string $info_fb_access_token
    ) {
        return $this->mysqlAdapter->query("
            UPDATE info SET 
                info_fb_access_token = '$info_fb_access_token'
        ");
    }

    private function schematize($row)
    {
        if (strpos($row['info_location'], 'iframe') === false) $row['info_location'] = '<iframe src="' . $row['info_location'] . '" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

        $PATH_DEFAULT = $_ENV['HTTP_DOMAIN'] . "public/img/";
        $PATH_FILES = $_ENV['HTTP_DOMAIN'] . "public/img.info/";

        // case logo
        $row['info_logo_url'] = $this->getContent('logo.svg');
        if ($row['info_logo'] != '' && $row['info_logo'] != null) $row['info_logo_url'] = $PATH_FILES . $row['info_logo'] . "?last=" . $row['info_last'];
        $row['info_logo_url2'] = $PATH_DEFAULT . 'logo.svg';
        if ($row['info_logo'] != '' && $row['info_logo'] != null) $row['info_logo_url2'] = $PATH_FILES . $row['info_logo'] . "?last=" . $row['info_last'];


        // case icon
        $row['info_icon_url'] = $this->getContent('icon.svg');
        if ($row['info_icon'] != '' && $row['info_icon'] != null) $row['info_icon_url'] = $PATH_FILES . $row['info_icon'] . "?last=" . $row['info_last'];
        $row['info_icon_url2'] = $PATH_DEFAULT . 'icon.svg';
        if ($row['info_icon'] != '' && $row['info_icon'] != null) $row['info_icon_url2'] = $PATH_FILES . $row['info_icon'] . "?last=" . $row['info_last'];

        // case services image
        $row['info_services_image_url'] = $PATH_DEFAULT . 'frontpage-services.jpg';
        if ($row['info_services_image'] != '' && $row['info_services_image'] != null) $row['info_services_image_url'] = $PATH_FILES . $row['info_services_image'] . "?last=" . $row['info_last'];

        // case portfolio image
        $row['info_portfolio_image_url'] = $PATH_DEFAULT . 'frontpage-portfolio.jpg';
        if ($row['info_portfolio_image'] != '' && $row['info_portfolio_image'] != null) $row['info_portfolio_image_url'] = $PATH_FILES . $row['info_portfolio_image'] . "?last=" . $row['info_last'];

        // case about image
        $row['info_about_image_url'] = $PATH_DEFAULT . 'frontpage-aboutus.jpg';
        if ($row['info_about_image'] != '' && $row['info_about_image'] != null) $row['info_about_image_url'] = $PATH_FILES . $row['info_about_image'] . "?last=" . $row['info_last'];
        return $row;
    }

    private function getContent($file = 'logo.svg')
    {
        ob_start();
        include('./public/img/' . $file);
        $content = ob_get_clean();
        return $content;
    }
}
