<?php
/**
 * Description of Navigation
 * @author Barif
 */

namespace Knws\PortfolioBundle\Model;

class Navigation
{
    public static function get($asset)
    {
        $navigation = array(
                'works' => array('asset' => 'knws_portfolio_works', 'label' => 'работы'),
                'services' => array('asset' => 'knws_portfolio_services', 'label' => 'услуги'),
                'skills' => array('asset' => 'knws_portfolio_skills', 'label' => 'навыки'),
                'contacts' => array('asset' => 'knws_portfolio_contacts', 'label' => 'контакты')
            );

        foreach($navigation as $key => $val)
        {
            if($asset == $val['asset']) {
                $navigation[$key]['active'] = true;
            } else {
                $navigation[$key]['active'] = false;
            }
        }

        return $navigation;
    }
}
