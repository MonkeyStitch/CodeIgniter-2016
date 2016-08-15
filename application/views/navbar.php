<?php 
$this->_menu[]=array(
	"title" => lang("menu_home"),
	"href" => "home",
);
$this->_menu[]=array(
	"title" => lang("menu_blog"),
	"href" => "blog",
);
//$this->_menu[]=array(
//    "title" => lang("menu_albums"),
//    "href" => "albums",
//);
$this->_menu[]=array(
    "title" => lang("menu_contact"),
    "href" => "contact",
);


if(isset($this->_aUser["username"]) && $this->_aUser["permission"]=="ADMIN")
{
    $this->_menu[]=array(
        "title" => lang("menu_admin"),
        "sub_menu" => array(
            array(
                "title" => lang("menu_manageUsers"),
                "href" => "admin/users",
            ),
        ),
    );
}

if(!isset($this->_aUser["username"]))
{
    $this->_menu[]=array(
        "title" => lang("menu_login"),
        "href" => "user/login",
    );
}
else
{
    // sub menu
    $sub_menu_username = array();
    $sub_menu_username[] = array(
        "title" => lang("menu_profile"),
        "href" => "user/profile",
    );
    if(strpos($this->_aUser["username"],'fb@')===false)
    {
        $sub_menu_username[] = array(
            "title" => lang("menu_change_password"),
            "href" => "user/change_password",
        );
    }
    $sub_menu_username[] = array(
        "title" => lang("menu_logout"),
        "href" => "user/logout",
    );

    // main
    $this->_menu[]=array(
        "title" => $this->_aUser["username"],
        "sub_menu" => $sub_menu_username
    );

}
?>
<ul class="nav navbar-nav navbar-right">
    <?php
    $this->current_page="";
    foreach ($this->_menu as $key => $value)
    {
        $active="";
        if(isset($value["href"]) && !isset($value["sub_menu"]))
        {
            if($value["href"]==$this->uri->segment(2) || $value["href"]==$this->uri->segment(2)."/".$this->uri->segment(3))
            {
                $active="active ";
                $this->current_page=$value["title"];
            }
            $link="";
            if(strpos($value["href"],"://")!==false)
            {
                $link=$value["href"];
            }
            else
            {
                $link=base_url($this->lang_code."/".$value["href"]);
            }
            ?>
            <li class="<?php echo $active; ?>">
                <a href="<?php echo $link; ?>"><?php echo $value["title"]; ?></a>
            </li>
            <?php
        }
        if(isset($value["sub_menu"]))
        {
            foreach ($value["sub_menu"] as $sub_menu)
            {
                if($sub_menu["href"]==$this->uri->segment(2))
                {
                    $active="active ";
                    $this->current_page=$sub_menu["title"];
                }
            }
            ?>
            <li class="dropdown <?php echo $active; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $value["title"]; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($value["sub_menu"] as $sub_menu)
                    {
                        $link="";
                        if(strpos($sub_menu["href"],"://")!==false)
                        {
                            $link=$sub_menu["href"];
                        }
                        else
                        {
                            $link=base_url($this->lang_code."/".$sub_menu["href"]);
                        }
                        ?>
                        <li>
                            <a href="<?php echo $link; ?>"><?php echo $sub_menu["title"]; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <?php
        }
    }
    if($this->uri->segment(2)=="")
    {
        $this->current_page=$this->_menu[0]["title"];
    }
    ?>
    <li>
        <div style="display: block; padding: 10px 15px; padding-bottom: 15px; padding-top: 15px; color: #fff">
            <?php
            $nav_lang= "";
            foreach ($this->_aLang as $key => $value) {
                $nav_lang.= " | ";
                if($key==$this->lang_code)
                {
                    $nav_lang.= strtoupper($key);
                }
                else
                {
                    $uri=base_url($this->uri->uri_string());
                    $uri=str_replace("/".$this->lang_code,"/".$key,$uri);
                    $nav_lang.= '<a href="'.$uri.'">'.strtoupper($key)."</a>";
                }
            }
            echo substr($nav_lang,2);
            ?>
        </div>
    </li>
</ul>