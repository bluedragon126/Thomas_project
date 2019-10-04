<?php

/**
 * borst actions.
 *
 * @package    sisterbt
 * @subpackage borst
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class borstActions extends sfActions
{

    /**
     * Executes Before Every Action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute()
    {
        $user = $this->getUser();
        $host_str = $this->getRequest()->getHost();
        $stdlib = new stdlib();
        $wantsurl = $stdlib->accessed_url();
        $this->getUser()->setAttribute('wantsurl', $wantsurl);
        $this->getUser()->setAttribute('third_menu', '');

        $actionName = $this->getActionName();
        $showdata = 0;

        if ($user->isAuthenticated()) {
            /*if($actionName=='index')
            {
            if($this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty')==1)
            {
            $showdata = 1;
            }
            else
            $showdata = 0;	
            }*/

            if ($this->getUser()->getAttribute('isSuperAdmin', '', 'userProperty') == 1)
                $showdata = 1;
            else
                $showdata = 1;

            if ($showdata == 1) {
                //$this->forward('home', 'adminHome');
            } else {
                $url = 'http://' . $host_str . '/';
                $this->redirect($url);
            }
        } else {
            $url = 'http://' . $host_str . '/user/loginWindow';
            $this->redirect($url);
        }
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        //$this->forward('default', 'module');
    }

    /**
     * Executes View BorstHome action
     *
     * @param sfRequest $request A request object
     */
    public function executeBorstHome(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_home');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
    }

    /**
     * Executes CreateArticle action
     *
     * @param sfRequest $request A request object
     */
    public function executeCreateArticle(sfWebRequest $request)
    {

        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_create_article');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        // Initialisation part
        $str = '';
        $i = 0;
        $cat_arr = $type_arr = $object_arr = $object_country_arr = $status_arr = $btshop_arr = array();
        $stdlib = new stdlib();
        $new_article = new Article();
        $article_html = new ArticleHtml();
        $new_template = new ArticleTemplate();
        $profile = new SfGuardUserProfile();

        $cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
        $type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
        $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
        $status_data = ArticleStatusTable::getInstance()->getAllBorstArticleStatus();
        $btshop_data = ArticleTable::getInstance()->getBtshopPlusArticles(1);//getAllBtshopPlusArticles();

        foreach ($cat_data as $cat) {
            $cat_arr[$cat->category_id] = $cat->category_name;
        }
        foreach ($type_data as $type) {
            $type_arr[$type->type_id] = $type->type_name;
        }
        foreach ($object_data as $obj) {
            $object_arr[$obj->object_id] = $obj->object_name;
        }
        foreach ($status_data as $status) {
            $status_arr[$status->art_statid] = $status->art_status;
        }
        foreach ($btshop_data as $btshop) {
            $btshop_arr[$btshop->id] = $btshop->btshop_article_title;
        }
        $action_mode = $request->getParameter('action_mode');
        $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');

        $this->all_templates = ArticleTemplateTable::getInstance()->getAllTemplates();
        foreach ($this->all_templates as $templates) {
            if ($i != 0)
                $str = $str . "," . $templates->template_name;
            else
                $str = $templates->template_name;
            $i++;
        }
        // For template show
        $this->template_name_list = $str;

        if ($request->getParameter('template_id')) {
            $this->tmplt_id = $request->getParameter('template_id');
            $this->article_id = 0;
            $article = Doctrine::getTable('ArticleTemplate')->find($request->getParameter('template_id'));
            $this->form = new ArticleTemplateForm($article);

            $this->html_rec = $article_html->getSelectedHtmlRecord('T' . $request->
                getParameter('template_id'));

            $this->form->setDefault('author_id', $article->author_id ? ($article->author_id >
                0 ? $article->author_id : $user_id) : $user_id);
        } else {
            $this->article_id = $request->getParameter('article_id');
            $article = Doctrine::getTable('Article')->find($request->getParameter('article_id'));

            if ($article) {

                //$article->author_id = $article->author_id ? ($article->author_id > 0 ? $article->author_id : $user_id) : $user_id;

                $is_old = 0;
                $ftext = htmlspecialchars(stripslashes($article->text));

                if (strstr($ftext, '[img'))
                    $is_old = 1;
                elseif (strstr($ftext, '[link='))
                    $is_old = 1;

                if ($is_old == 1)
                    $ftext = nl2br($ftext);

                $ftext = $stdlib->zitat($ftext);
                $ftext = $stdlib->make_link($ftext);
                $ftext = $stdlib->bbcode($ftext);
                $article->text = $ftext;
            }

            $this->form = new ArticleForm($article);
            $this->html_rec = $article_html->getSelectedHtmlRecord($request->getParameter('article_id'));
        }

        /*$ftext = htmlspecialchars(stripslashes($article->text));
        $ftext = $stdlib->zitat($ftext);
        $ftext = $stdlib->make_link($ftext); 
        $ftext = $stdlib->bbcode($ftext);
        $article->text = $ftext;*/

        $this->wSchema = $this->form->getWidgetSchema();
        $this->wSchema['art_statid']->setOption('choices', $status_arr);
        $this->wSchema['category_id']->setOption('choices', $cat_arr);
        $this->wSchema['type_id']->setOption('choices', $type_arr);
        $this->wSchema['object_id']->setOption('choices', $object_arr);
        $this->wSchema['btshop_id']->setOption('choices', $btshop_arr);
        
        //$this->wSchema['author']->setOption('choices',$arrAuthors);

        if ($action_mode == 'edit_article') {
            //$this->form->setDefault('art_statid',$edit_art_data->art_statid);
            //$this->form->setDefault('author','');
        } else
            if ($request->getParameter('template_id')) {
                //$this->form->setDefault('art_statid',$edit_art_data->art_statid);
                //$this->form->setDefault('author','');
            } else {
                $this->form->setDefault('art_statid', 2);
                $this->form->setDefault('article_date', date("Y-m-d H:i:s"));
                //$this->form->setDefault('author','');
            }

            if ($request->isMethod('post')) {
                $arr = $this->getRequest()->getParameterHolder()->getAll();
                $form_arr = $request->getParameter($this->form->getName());
                $sfuser = Doctrine::getTable('sfGuardUser')->find($form_arr['author_id']);

                //$article->author_id = $sfuser->id ?$sfuser->id:$user_id;
                $form_arr['author'] = $sfuser->SfGuardUserProfile->firstname . " " . $sfuser->
                    SfGuardUserProfile->lastname;

                if ($arr['objekt'] != '' && $arr['land'] != '') {
                    $objekt = new Objekt();
                    $reply = $objekt->isObjectPresent($arr['objekt'], $arr['land']);
                    if ($reply == 'new') {
                        $obj_id = $objekt->setSelectedObject($arr['objekt'], $arr['land']);
                        $form_arr['object_id'] = $obj_id;
                    }
                }

                $this->form->bind($form_arr);

                if ($this->form->isValid()) {
                    if ($arr['temp_switch'] > 0) {
                        if ($arr['add_as_article']) {
                            $new_id = $new_article->insertNewArticleRecord($this->form, $arr);

                            $profile->updateActivityCount($this->getUser()->getAttribute('user_id', '',
                                'userProperty'));
                            $one_rec = $article_html->getSelectedHtmlRecord($new_id);
                            if ($one_rec)
                                $one_rec->updateSelectedHtmlRecord($arr['external_file']);
                            else
                                $article_html->insertNewHtmlRecord($new_id, $arr['external_file'], date("Y-m-d H:i:s"));
                        } else {
                            $obj = $this->form->save();

                            $one_rec = $article_html->getSelectedHtmlRecord('T' . $obj->template_id);
                            if ($one_rec)
                                $one_rec->updateSelectedHtmlRecord($arr['external_file']);
                            else
                                $article_html->insertNewHtmlRecord('T' . $obj->template_id, $arr['external_file'],
                                    date("Y-m-d H:i:s"));
                        }
                        $this->redirect('borst/articleList');
                    } else {
                        if ($arr['save_temp'] == 1) {
                            $new_id = $new_template->insertNewTemplateRecord($this->form, $arr);

                            $one_rec = $article_html->getSelectedHtmlRecord('T' . $new_id);
                            if ($one_rec)
                                $one_rec->updateSelectedHtmlRecord($arr['external_file']);
                            else
                                $article_html->insertNewHtmlRecord('T' . $new_id, $arr['external_file'], date("Y-m-d H:i:s"));

                            $this->redirect('borst/articleList');
                        } else {
                            $obj = $this->form->save();
                            $this->isSaved = 1;
                            $one_rec = $article_html->getSelectedHtmlRecord($obj->article_id);
                            if ($one_rec)
                                $one_rec->updateSelectedHtmlRecord($arr['external_file']);
                            else
                                $article_html->insertNewHtmlRecord($obj->article_id, $arr['external_file'], date
                                    ("Y-m-d H:i:s"));

                            $url = 'http://' . $this->host_str .
                                '/backend.php/borst/createArticle/action_mode/edit_article/article_id/' . $arr['edit_id'];
                            if ($arr['saveOnly'] != 1)
                                $this->redirect('borst/articleList');
                        }
                    }

                } else {
                    //echo $this->form->getErrorSchema();
                }
            }

    }

    /**
     * Executes ArticleList action
     *
     * @param sfRequest $request A request object
     */
    public function executeArticleList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_article_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        // Collecting Category, Type and Object.
        $cat_arr = $type_arr = $object_arr = $object_country_arr = $status_arr = $count_arr =
            $this->param_arr = array();
        $ext = "";

        $cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
        $type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
        $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
        $status_data = ArticleStatusTable::getInstance()->getAllBorstArticleStatus();
        

        $cat_arr[0] = 'Kategory';
        $status_arr[0] = 'Status';

        foreach ($cat_data as $cat) {
            $cat_arr[$cat->category_id] = $cat->category_name;
        }
        foreach ($type_data as $type) {
            $type_arr[$type->type_id] = $type->type_name;
        }
        foreach ($object_data as $obj) {
            $object_arr[$obj->object_id] = $obj->object_name;
        }
        foreach ($status_data as $status) {
            $status_arr[$status->art_statid] = $status->art_status;
        }
        
        // After Post Part
        $article = new Article();
        $arr = $this->getRequest()->getParameterHolder()->getAll();

        if ($arr['art_search'] == 1 || $this->getRequestParameter('art_search') == 1 ||
            $arr['action_mode'] == 'update_artiklar') {
            $query = ArticleTable::getInstance()->getFindArticleQuery($arr);
            $ext = $article->getSearchedParameterString($arr);
        } else {
            // Only for Column sorting.
            if ($this->getRequestParameter('sortby'))
                $query = ArticleTable::getInstance()->getSortingArticleQuery($this->
                    getRequestParameter('sortby'));
            else
                $query = ArticleTable::getInstance()->getAllBorstArticlesByDate($column_id, $order);

            $this->ext = '&sortby=' . $this->getRequestParameter('sortby');
        }

        $this->param_arr['art_id'] = $arr['art_id'] ? $arr['art_id'] : ($arr['art_id_update'] ?
            $arr['art_id_update'] : $this->getRequestParameter('art_id'));
        $this->param_arr['art_title'] = $arr['art_title'] ? $arr['art_title'] : ($arr['art_title_update'] ?
            $arr['art_title_update'] : $this->getRequestParameter('art_title'));
        $this->param_arr['search_katID'] = $arr['search_katID'] > 0 ? $arr['search_katID'] : ($arr['search_katID_update'] ?
            $arr['search_katID_update'] : $this->getRequestParameter('search_katID'));
        $this->param_arr['search_art_statID'] = $arr['search_art_statID'] > 0 ? $arr['search_art_statID'] : ($arr['search_art_statID_update'] ?
            $arr['search_art_statID_update'] : $this->getRequestParameter('search_art_statID'));
        $this->param_arr['sort_order'] = $arr['sort_order'] ? $arr['sort_order'] : ($arr['sort_order_update'] ?
            $arr['sort_order_update'] : $this->getRequestParameter('sort_order'));
        $this->param_arr['no_of_pages'] = $arr['no_of_pages'] ? $arr['no_of_pages'] : ($arr['no_of_pages_update'] ?
            $arr['no_of_pages_update'] : $this->getRequestParameter('no_of_pages'));

        //$no_of_pages = $this->param_arr['no_of_pages'] ? $this->param_arr['no_of_pages'] : ($arr['no_of_pages_update'] ? $arr['no_of_pages_update'] : 25);
        $order_count = Doctrine::getTable('OrderCount')->findByAction($this->
            getActionName());
        $no_of_pages = $order_count->getOrderCount();
        $this->orderForm = new OrderCountForm($order_count);
        // For deleting a specific article
        if ($arr['delete_article_id']) {
            $one_article = $article->getSelectedArticle($arr['delete_article_id']);
            if ($one_article)
                $one_article->delete();

            $article_html = new ArticleHtml();
            $html_rec = $article_html->getSelectedHtmlRecord($arr['delete_article_id']);
            if ($html_rec)
                $html_rec->delete();

            $article_cnt = new ArticleCount();
            $article_cnt->deleteBtViewCnt($arr['delete_article_id']);
        }

        // For updating article records
        if ($arr['action_mode'] == 'update_artiklar') {
            if ($arr['artikelID']) {
                if (!$arr['delete_article_id']) {
                    foreach ($arr['artikelID'] as $key => $value) {
                        $record = $article->getSelectedArticle($value);
                        $record = $record->setSelectedArticle($arr["a_datum"][$key], $arr["rubrik"][$key],
                            $arr["sel_art_statID"][$key]);
                    }
                }
            }
        }

        $this->pager = new sfDoctrinePager('Article', $no_of_pages);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
        foreach ($this->pager->getResults() as $article) {
            $art_ids[] = $article->article_id;
        }
        
        $count_data = ArticleCountTable::getInstance()->getAllBorstArticleCount($art_ids);
        
        foreach ($count_data as $count) {
            $count_arr[$count->art_id] = $count->click_cnt;
        }

        $this->cat_arr = $cat_arr;
        $this->type_arr = $type_arr;
        $this->object_arr = $object_arr;
        $this->status_arr = $status_arr;
        $this->count_arr = $count_arr;
        $this->ext = $ext;

        $this->art_id = $this->param_arr['art_id'];
        $this->search_katID = $this->param_arr['search_katID'];
        $this->search_art_statID = $this->param_arr['search_art_statID'];
        $this->art_title = $this->param_arr['art_title'];
        $this->sort_order = $this->param_arr['sort_order'];
        $this->no_of_pages = $this->param_arr['no_of_pages'];
    }

    /**
     * Executes ArticleList action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetSearchArticleList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_article_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $profile = new SfGuardUserProfile();

        $cat_arr = $type_arr = $object_arr = $object_country_arr = $status_arr = $count_arr =
            $this->param_arr = array();
        $ext = "";

        $cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
        $type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();
        $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
        $status_data = ArticleStatusTable::getInstance()->getAllBorstArticleStatus();
        //$count_data = ArticleCountTable::getInstance()->getAllBorstArticleCount();

        $cat_arr[0] = 'Kategory';
        $status_arr[0] = 'Status';

        foreach ($cat_data as $cat) {
            $cat_arr[$cat->category_id] = $cat->category_name;
        }
        foreach ($type_data as $type) {
            $type_arr[$type->type_id] = $type->type_name;
        }
        foreach ($object_data as $obj) {
            $object_arr[$obj->object_id] = $obj->object_name;
        }
        foreach ($status_data as $status) {
            $status_arr[$status->art_statid] = $status->art_status;
        }
        

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('search_article_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $search_user_column_order = $request->getParameter('search_article_column_order');
        $set_column = 'search_article_column';
        $set_column_order = 'search_article_column_order';

        $order = $profile->setSortingParameters($page, $search_user_column_order, $column_id,
            $current_column, $set_column, $set_column_order);

        // After Post Part
        $article = new Article();
        $arr = $this->getRequest()->getParameterHolder()->getAll();

        $query = ArticleTable::getInstance()->getSortingArticleQuery($arr, $column_id, $order);

        //$no_of_pages = $arr['no_of_pages'] ? $arr['no_of_pages'] : 25;
        $order_count = Doctrine::getTable('OrderCount')->findByAction('articleList');
        $no_of_pages = $order_count->getOrderCount();
        $this->orderForm = new OrderCountForm($order_count);
        // For deleting a specific article
        if ($arr['delete_article_id']) {
            $one_article = $article->getSelectedArticle($arr['delete_article_id']);
            if ($one_article)
                $one_article->delete();

            $article_html = new ArticleHtml();
            $html_rec = $article_html->getSelectedHtmlRecord($arr['delete_article_id']);
            if ($html_rec)
                $html_rec->delete();

            $article_cnt = new ArticleCount();
            $article_cnt->deleteBtViewCnt($arr['delete_article_id']);
        }

        // For updating article records
        if ($arr['action_mode'] == 'update_artiklar') {
            if ($arr['artikelID']) {
                if (!$arr['delete_article_id']) {
                    foreach ($arr['artikelID'] as $key => $value) {
                        $record = $article->getSelectedArticle($value);
                        $record = $record->setSelectedArticle($arr["a_datum"][$key], $arr["rubrik"][$key],
                            $arr["sel_art_statID"][$key]);
                    }
                }
            }
        }

        $this->pager = new sfDoctrinePager('Article', $no_of_pages);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
        foreach ($this->pager->getResults() as $article) {
            $art_ids[] = $article->article_id;
        }
        $count_data = ArticleCountTable::getInstance()->getAllBorstArticleCount($art_ids);
        
        foreach ($count_data as $count) {
            $count_arr[$count->art_id] = $count->click_cnt;
        }
        $this->cat_arr = $cat_arr;
        $this->type_arr = $type_arr;
        $this->object_arr = $object_arr;
        $this->status_arr = $status_arr;
        $this->count_arr = $count_arr;
        $this->ext = $ext;

        $this->art_id = $this->param_arr['art_id'];
        $this->search_katID = $this->param_arr['search_katID'];
        $this->search_art_statID = $this->param_arr['search_art_statID'];
        $this->art_title = $this->param_arr['art_title'];
        $this->sort_order = $this->param_arr['sort_order'];
        $this->no_of_pages = $this->param_arr['no_of_pages'];
        $this->column_id = $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;
        $this->page_number = $page;
    }


    /**
     * Executes ArticleProperties action
     *
     * @param sfRequest $request A request object
     */
    public function executeArticleProperties(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_article_properties');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        $arr = $this->getRequest()->getParameterHolder()->getAll();

        // For editing a specific article category name
        if ($arr['edit_cat_id'] || $arr['edit_type_id']) {
            if ($arr['edit_cat_id']) {
                $articleCategory = new ArticleCategory();
                $one_category = $articleCategory->getSelectedArticleCategory($arr['edit_cat_id']);
                if ($one_category)
                    $one_category->setArticleCategoryName($arr['category_name']);
            }
            if ($arr['edit_type_id']) {
                $articleType = new ArticleType();
                $one_type = $articleType->getSelectedArticleType($arr['edit_type_id']);
                if ($one_type)
                    $one_type->setArticleTypeName($arr['type_name']);
            }
        }

        // For deleting a specific article category
        if ($arr['delete_cat_id'] || $arr['delete_type_id']) {
            if ($arr['delete_cat_id']) {
                $articleCategory = new ArticleCategory();
                $one_category = $articleCategory->getSelectedArticleCategory($arr['delete_cat_id']);
                if ($one_category)
                    $one_category->delete();
            }
            if ($arr['delete_type_id']) {
                $articleType = new ArticleType();
                $one_type = $articleType->getSelectedArticleType($arr['delete_type_id']);
                if ($one_type)
                    $one_type->delete();
            }
        }

        // For adding new article category.
        if ($arr['add_category_text'] || $arr['add_type_text']) {
            if ($arr['add_category_text']) {
                $articleCategory = new ArticleCategory();
                $articleCategory->addNewArticleCategoryName($arr['add_category_text']);
            }
            if ($arr['add_type_text']) {
                $articleType = new ArticleType();
                $articleType->addNewArticleTypeName($arr['add_type_text']);
            }
        }

        // Collecting Category.
        $cat_arr = $type_arr = array();

        $cat_data = ArticleCategoryTable::getInstance()->getAllBorstArticleCategories();
        $type_data = ArticleTypeTable::getInstance()->getAllBorstArticleTypes();

        foreach ($cat_data as $cat) {
            $cat_arr[$cat->category_id] = $cat->category_name;
        }
        foreach ($type_data as $type) {
            $type_arr[$type->type_id] = $type->type_name;
        }

        $this->cat_arr = $cat_arr;
        $this->type_arr = $type_arr;
    }
    /**
     * Executes ListObject action
     *
     * @param sfRequest $request A request object
     */
    public function executeListObject(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_list_object');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $ext = $obj_name = '';
        $param = array();
        $mymarket = new mymarket();

        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $obj_name = $arr['obj_name'] ? $arr['obj_name'] : ($arr['obj_name_update'] ? $arr['obj_name_update'] :
            $this->getRequestParameter('obj_name'));
        $obj_land = $arr['obj_land'] ? $arr['obj_land'] : ($arr['obj_land_update'] ? $arr['obj_land_update'] :
            $this->getRequestParameter('obj_land'));

        if ($obj_name || $obj_land) {
            if ($obj_name)
                $param['obj_name'] = $obj_name;
            if ($obj_land)
                $param['obj_land'] = $obj_land;

            $ext = http_build_query($param);
            $search_arr = array("&", "=");
            $ext = str_replace($search_arr, "/", $ext);

            $query = ObjektTable::getInstance()->getFindObjectsQuery($param);
        } else
            $query = ObjektTable::getInstance()->getAllBorstArticleObjectsQuery();

        $obj = new Objekt();

        // For deleting records
        if ($arr['delete_obj_id']) {
            $one_obj = $obj->getSelectedObject($arr['delete_obj_id']);
            $one_obj->delete();
        }

        // For updating records
        if ($arr['action_mode'] == 'update_objekt_list') {
            if ($arr['objektID']) {
                if (!$arr['delete_obj_id']) {
                    foreach ($arr['objektID'] as $key => $value) {
                        $record = $obj->getSelectedObject($value);
                        $record = $record->setSelectedObject($arr["objekt"][$key], $arr["land"][$key]);
                    }
                }
            }
        }
        $this->rec_per_page = 25;
        $this->pager = $mymarket->getPagerForAll('Objekt', $this->rec_per_page, $query,
            $request->getParameter('page', 1));

        $this->ext = $ext;
        $this->obj_name = $obj_name;
        $this->obj_land = $obj_land;
    }
    /**
     * Executes UserList action
     *
     * @param sfRequest $request A request object
     */
    public function executeUserList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_user_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();

        // Collecting Category, Type and Object.
        $abon_arr = $user_status_arr = array();
        $ext = $column_id = $order = "";
        $order_count = Doctrine::getTable('OrderCount')->findByAction($this->
            getActionName());
        $this->rec_per_page = $order_count->getOrderCount();
        $this->orderForm = new OrderCountForm($order_count);
        $profile = new SfGuardUserProfile();
        $this->transaction_data = new UserTransaction();

        $abon_data = AbonTable::getInstance()->getAllAbon();
        $user_status_data = UserStatusTable::getInstance()->getAllUserStatus();

        $abon_arr[0] = 'ABONNENT';
        $user_status_arr[0] = 'USERSTAT';

        foreach ($abon_data as $abon) {
            $abon_arr[$abon->abonid] = $abon->abon_name;
        }
        foreach ($user_status_data as $status) {
            $user_status_arr[$status->userstatid] = $status->userstat;
        }

        $arr = $this->getRequest()->getParameterHolder()->getAll();
        if ($arr['search_user'] || $this->getRequestParameter('search_user'))
            $query = $profile->getSearchedUserParameterString($arr, $column_id, $order);
        else
            $query = SfGuardUserProfileTable::getInstance()->getAllUserQuery();


        $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile', $this->
            rec_per_page, $query, $request->getParameter('page', 1));

        $this->abon_arr = $abon_arr;
        $this->user_status_arr = $user_status_arr;

        $this->count_arr = $profile->getAllUserCount();

    }

    /**
     * Executes GetSearchUserList action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetSearchUserList(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        $this->transaction_data = new UserTransaction();

        $abon_arr = $user_status_arr = array();
        $this->delete_user_flag = 0;

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('search_user_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $search_user_column_order = $request->getParameter('search_user_column_order');
        $set_column = 'search_user_column';
        $set_column_order = 'search_user_column_order';

        $order = $profile->setSortingParameters($page, $search_user_column_order, $column_id,
            $current_column, $set_column, $set_column_order);

        $abon_data = AbonTable::getInstance()->getAllAbon();
        $user_status_data = UserStatusTable::getInstance()->getAllUserStatus();
        $abon_arr[0] = 'ABONNENT';
        $user_status_arr[0] = 'USERSTAT';

        foreach ($abon_data as $abon) {
            $abon_arr[$abon->abonid] = $abon->abon_name;
        }
        foreach ($user_status_data as $status) {
            $user_status_arr[$status->userstatid] = $status->userstat;
        }

        $arr = $this->getRequest()->getParameterHolder()->getAll();

        if ($request->getParameter('delete_user_id')) {
            $this->del_username = $profile->getFullUserName($request->getParameter('delete_user_id'));
            $profile->deleteUser($request->getParameter('delete_user_id'));
            $this->delete_user_flag = 1;
        }

        if ($arr['search_user'] || $this->getRequestParameter('search_user'))
            $query = $profile->getSearchedUserParameterString($arr, $column_id, $order);
        else
            if ($arr['update_selected_users'] || $this->getRequestParameter('update_selected_users'))
                $profile->updateSelectedUsers($arr);
            else
                $query = SfGuardUserProfileTable::getInstance()->getAllUserQuery();

        $order_count = Doctrine::getTable('OrderCount')->findByAction('userList');
        $this->orderForm = new OrderCountForm($order_count);
        $this->rec_per_page = $order_count->getOrderCount();
        //$this->rec_per_page = $arr['no_of_pages'] ? (is_numeric($arr['no_of_pages']) ? $arr['no_of_pages'] : 20 ) : 20;

        $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile', $this->
            rec_per_page, $query, $request->getParameter('page', 1));

        $this->abon_arr = $abon_arr;
        $this->user_status_arr = $user_status_arr;
        $this->count_arr = $profile->getAllUserCount();
        $this->column_id = $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;
    }
    /**
     *
     *
     */
    public function executeSaveOrderCount(sfWebRequest $request)
    {
        $orderForm = new OrderCountForm();
        $param = $request->getParameter($orderForm->getName());

        $oc = Doctrine::getTable('OrderCount')->findByAction($param['action']);

        $orderForm = new OrderCountForm($oc);
        $orderForm->bind($param);

        if ($orderForm->isValid()) {
            $orderForm->save();
        }
        return SfView::NONE;
    }

    /**
     * Executes SbtInactiveUserList action
     *
     * @param sfRequest $request A request object
     */
    public function executeSbtInactiveUserList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_user_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            foreach ($arr['activateme'] as $key => $value) {
                $profile = new SfGuardUserProfile();
                $data = $profile->getUserData($key);
                if ($data) {
                    $data->sbt_active = 1;
                    $data->save();
                }
            }
        }

        $query = SfGuardUserProfileTable::getInstance()->getAllSbtInactiveUserQuery();

        $this->pager = $mymarket->getPagerForAll('SfGuardUserProfile', 50, $query, $request->
            getParameter('page', 1));
    }

    /**
     * Executes RemindUser action
     *
     * @param sfRequest $request A request object
     */
    public function executeRemindUser(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_remind_user');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $this->greenmsg = $this->getUser()->getAttribute('reminduser_greenmsg');
        $this->getUser()->setAttribute('reminduser_greenmsg', '');

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $in_clause = "";
            $in_clause_abon = "";

            if (isset($arr['btn_remind'])) {
                if (isset($arr["ny"]))
                    $in_clause .= "," . $arr["ny"];
                if (isset($arr["pamind"]))
                    $in_clause .= "," . $arr["pamind"];
                if (isset($arr["betald"]))
                    $in_clause .= "," . $arr["betald"];
                if (isset($arr["obetald"]))
                    $in_clause .= "," . $arr["obetald"];
                if (isset($arr["avtackad"]))
                    $in_clause .= "," . $arr["avtackad"];
                if (isset($arr["chb_prov"]))
                    $in_clause_abon .= "," . $arr["chb_prov"];
                if (isset($arr["chb_faktura"]))
                    $in_clause_abon .= "," . $arr["chb_faktura"];
                if (isset($arr["chb_autogiro"]))
                    $in_clause_abon .= "," . $arr["chb_autogiro"];
            }

            /* need to strip off the leading comma */
            $in_clause = substr($in_clause, 1);
            $in_clause_abon = substr($in_clause_abon, 1);
            $uname = array();
            $no_of_days = $arr['time_left'] ? $arr['time_left'] : 7;

            $profile = new SfGuardUserProfile();

            if ($arr['txt_remind_users'] != "") {
                $uname = $profile->getRemindUserListByEmail($arr, $in_clause, $in_clause_abon);
            } else {
                $uname = $profile->getRemindUserListByCheckBox($arr, $in_clause, $in_clause_abon,
                    $no_of_days);
            }

            if (count($uname) > 0) {
                $query = Doctrine_Query::create()->from('SfGuardUserProfile sup')->whereIn('sup.username',
                    $uname);
                $usernames = $query->execute();
                if ($usernames) {
                    $this->getUser()->setAttribute('userlist_to_remind', $usernames);
                    $this->getUser()->setAttribute('remind_mail_data', $arr);
                    $this->forward('email', 'remindUserMail');
                }
            }
        }
    }

    /**
     * Executes NewsletterForm action
     *
     * @param sfRequest $request A request object
     */
    public function executeNewsletterForm(sfWebRequest $request)
    {
        $_log_file_name = sfConfig::get('sf_root_dir') . "/web/data.txt";
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $article = new Article();
        $news_letter_sent = new NewsletterSent();
        $newsletterAccount = new NewsletterAccount();
        $newsletterPublic = new NewsletterPublic();
        $number_sent = 0;
        $this->newsletter = Doctrine::getTable("NewsLetter")->getPublishNewsLetter();
        if ($request->isMethod('post')) {
            file_put_contents($_log_file_name, 0);
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $i = 0;
            $kundgrupp = "";

            if ($arr['kundgrupp'] == '4') {
                $to = explode(",", $arr['mail_to']);
                $kundgrupp = "manuellt inlagda adresser";
            }

            if ($arr['kundgrupp'] == '2') {
                $reg_email_arr = $article->getEmailFromNewsletterAccount($arr);
                $to = $reg_email_arr;
                $kundgrupp = "Konto-mejl";
            }

            if ($arr['kundgrupp'] == '3') {
                $reg_email_arr = $article->getEmailFromNewsletterPublic();
                $to = $reg_email_arr;
                $kundgrupp = "Publika mejl";
            }
            $mailBody = $arr['mail_body'];
            $from = sfConfig::get('app_newsletter_email');
            //$from = $arr['mail_from'];
            
            set_time_limit(0);
            
            $offset = 0 ; 
            $number_sent = 0;
            
            $message = $this->getMailer()->compose();
            $message->setSubject($arr['subject']);
            $message->setFrom($from,'Börstjänaren JUST NU');
            $message->setBody($mailBody, 'text/html');
            
            //$message->attachPlugin(new Swift_Plugin_AntiFlood(200, 10), "anti-flood");
            foreach($to as $_to){
               try{
                    $message->setTo($_to);
					if($arr['kundgrupp'] == '4')
                    {$this->getMailer()->sendNextImmediately();}
                    $number_sent += $this->getMailer()->send($message);
                    //$number_sent += $this->getMailer()->batchSend($message,&$_to);
                    
                }catch (Exception $e)
                { 
                   echo $e->getMessage();
                }
                file_put_contents($_log_file_name, $number_sent);
            }
            
            
            if($number_sent){
                $news_letter_sent->addSentMail($number_sent, $arr);
                $this->getUser()->setFlash('greenmsg',"Ett mejl har skickats till $number_sent $kundgrupp!");
                $url = 'http://' . $this->host_str . '/backend.php/borst/newsletterForm';
                $this->redirect($url);
                
            }
            
        }

        $this->registered_user_cnt = $newsletterAccount->getNewsAccountCnt();
        $this->unregistered_user_cnt = $newsletterPublic->getNewsPublicCnt();
    }

    /**
     * Executes SentMailList action
     *
     * @param sfRequest $request A request object
     */
    public function executeSentMailList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();

        $newsletterSent = new NewsletterSent();
        $query = $newsletterSent->getAllSentMailData();

        $this->pager = $mymarket->getPagerForAll('NewsletterSent', 25, $query, $request->
            getParameter('page', 1));
    }

    /**
     * Executes AddRemoveEmail action
     *
     * @param sfRequest $request A request object
     */
    public function executeAddRemoveEmail(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $newletter_account = new NewsletterAccount();
        $newletter_public = new NewsletterPublic();
        $mymarket = new mymarket();

        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $acc_ext = $pub_ext = '';

        if ($arr['mode'] == 'del_email_account') {
            if ($request->getParameter('id')) {
                $account_data = $newletter_account->getPerticularNewsAccountRecord($request->
                    getParameter('id'));
                if ($account_data)
                    $account_data->delete();
            }
        }
        if ($arr['mode'] == 'del_email_public') {
            if ($request->getParameter('id')) {
                $public_data = $newletter_public->getPerticularNewsPublicRecord($request->
                    getParameter('id'));
                if ($public_data)
                    $public_data->delete();
            }
        }

        if ($arr['mode'] == 'add_email') {
            if ($arr['tbl'] == 'newsletter_account') {
                if (isset($arr['email']) && $arr['email'] != "") {
                    $account_data = $newletter_account->isNewsAccountEmailPresent($arr['email']);
                    if ($account_data->id == '') {
                        $ad_email = new NewsletterAccount();
                        $ad_email->addEmail($arr['email']);
                    }
                }
            }
            if ($arr['tbl'] == 'newsletter_public') {
                if (isset($arr['email']) && $arr['email'] != "") {
                    $public_data = $newletter_public->isNewsPublicEmailPresent($arr['email']);
                    if ($public_data->id == '') {
                        $ad_email = new NewsletterPublic();
                        $ad_email->addNewsletterSubcriber($arr['email']);
                    }
                }
            }
        }

        if (isset($arr['search_email']) && $arr['search_email'] != "")
            $search_email = $arr['search_email'];
        elseif ($request->getParameter('acc_page'))
            $search_email = $arr['search_email'];
        else
            $search_email = '';

        if ($search_email != "") {
            $news_acc_query = $newletter_account->getSimilarEmailAddressesQuery($search_email);
            $news_pub_query = $newletter_public->getSimilarEmailAddressesQuery($search_email);
            $search = '&search_email=' . $search_email;
        } else {
            $news_acc_query = $newletter_account->getAllNewsAccountRecordQuery();
            $news_pub_query = $newletter_public->getAllNewsPublicRecordQuery();
            $search = '';
        }

        $pub_str = $request->getParameter('pub_page') > 0 ? $request->getParameter('pub_page') :
            1;
        $acc_str = $request->getParameter('acc_page') > 0 ? $request->getParameter('acc_page') :
            1;

        $acc_ext .= '/pub_page/' . $pub_str . $search;
        $pub_ext .= '/acc_page/' . $acc_str . $search;

        $this->acc_ext = $acc_ext;
        $this->pub_ext = $pub_ext;

        $this->emaillist_account_pager = $mymarket->getPagerForAll('NewsletterAccount',
            25, $news_acc_query, $request->getParameter('acc_page', 1));
        $this->emaillist_public_pager = $mymarket->getPagerForAll('NewsletterPublic', 25,
            $news_pub_query, $request->getParameter('pub_page', 1));

    }

    /**
     * Executes DeleteEmail action
     *
     * @param sfRequest $request A request object
     */
    public function executeDeleteEmail(sfWebRequest $request)
    {
        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $newletter_account = new NewsletterAccount();
        $newletter_public = new NewsletterPublic();

        if ($arr['mode'] == 'del_email_account') {
            if ($request->getParameter('id')) {
                $account_data = $newletter_account->getPerticularNewsAccountRecord($request->
                    getParameter('id'));
                if ($account_data)
                    $account_data->delete();
            }
        }
        if ($arr['mode'] == 'del_email_public') {
            if ($request->getParameter('id')) {
                $public_data = $newletter_public->getPerticularNewsPublicRecord($request->
                    getParameter('id'));
                if ($public_data)
                    $public_data->delete();
            }
        }
        return sfView::NONE;
    }


    /**
     * Executes NewsletterUser action
     *
     * @param sfRequest $request A request object
     */
    public function executeNewsletterUser(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $newletter_account = new NewsletterAccount();

        $abon_data = AbonTable::getInstance()->getAllAbon();
        $user_status_data = UserStatusTable::getInstance()->getAllUserStatus();

        $abon_arr[0] = '-';
        $user_status_arr[0] = '-';

        foreach ($abon_data as $abon) {
            $abon_arr[$abon->abonid] = $abon->abon_name;
        }
        foreach ($user_status_data as $status) {
            $user_status_arr[$status->userstatid] = $status->userstat;
        }

        $this->allAbon = $abon_arr;
        $this->allUserStatus = $user_status_arr;

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->emails = $newletter_account->getEmailForNewsletterUser($arr);
        } else {
            $this->emails = $newletter_account->getAllRegisteredEmailForNewsletterUser($arr);
        }
    }
    
    
    
    /**
     * Executes SemicolonSeperater action
     *
     * @param sfRequest $request A request object
     */
    public function executeSemicolonSeperater(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $newletter_account = new NewsletterAccount();

        $abon_data = AbonTable::getInstance()->getAllAbon();
        $user_status_data = UserStatusTable::getInstance()->getAllUserStatus();

        $abon_arr[0] = '-';
        $user_status_arr[0] = '-';

        foreach ($abon_data as $abon) {
            $abon_arr[$abon->abonid] = $abon->abon_name;
        }
        foreach ($user_status_data as $status) {
            $user_status_arr[$status->userstatid] = $status->userstat;
        }

        $this->allAbon = $abon_arr;
        $this->allUserStatus = $user_status_arr;

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->emails = $newletter_account->getEmailForNewsletterUser($arr);
        } else {
            $this->emails = $newletter_account->getAllRegisteredEmailForNewsletterUser($arr);
        }
    }

    /**
     * Executes SendArticleUpdateForm action
     *
     * @param sfRequest $request A request object
     */
    public function executeSendArticleUpdateForm(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu',
            'borst_menu_send_article_update_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $article = new Article();
        $news_letter_sent = new NewsletterSent();
        $newsletterAccount = new NewsletterAccount();
        $newsletterPublic = new NewsletterPublic();
        $number_sent = 0;

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $update_article_data = $article->fetchArticleForUpdate($arr);

            $mailBody = $this->getPartial('update_article_mail', array('update_article_data' =>
                $update_article_data, 'host_str' => $this->host_str));

            $arr['mail_body'] = $mailBody;

            if ($arr['kundgrupp'] == '4') {
                $to = explode(",", $arr['mail_to']);
                $kundgrupp = "manuellt inlagda adresser";
            }

            if ($arr['kundgrupp'] == '2') {
                $reg_email_arr = $article->getEmailFromNewsletterAccount($arr);
                $to = $reg_email_arr;
                $kundgrupp = "Konto-mejl";
            }

            if ($arr['kundgrupp'] == '3') {
                $reg_email_arr = $article->getEmailFromNewsletterPublic();
                $to = $reg_email_arr;
                $kundgrupp = "Publika mejl";
            }

            $from = sfConfig::get('app_mail_sender_email');

            $message = $this->getMailer()->compose();

            //$message->attachPlugin(new Swift_Plugin_AntiFlood(200, 10), "anti-flood");
            $message->setSubject($arr['subject']);
            $message->setTo($to);
            $message->setFrom($from);
            $message->setBody($mailBody, 'text/html');
            $number_sent = $this->getMailer()->batchSend($message);

            $this->greenmsg = "Ett mejl har skickats till $number_sent $kundgrupp!";
            //if($i)
            //$this->greenmsg .= "Det finns $i i tabellen för $kundgrupp<br />";

            $news_letter_sent->addSentMail($number_sent, $arr);
        }
        $this->registered_user_cnt = $newsletterAccount->getNewsAccountCnt();
        $this->unregistered_user_cnt = $newsletterPublic->getNewsPublicCnt();

    }

    /**
     * Executes ContactEnquiry action
     *
     * @param sfRequest $request A request object
     */
    public function executeContactEnquiry(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_contact_enquiry');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        $this->ans_type = 'ans_0';

        $query = ContactEnquiryTable::getInstance()->getAllEnquiriesByOrderQuery($column_id,
            $order, 0);
        $this->pager = $mymarket->getPagerForAll('ContactEnquiry', 10, $query, $request->
            getParameter('page', 1));
    }


    /**
     * Executes getContactEnquiry action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetContactEnquiry(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        $contactEnquiry = new ContactEnquiry();

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('borst_enquiry_form_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $borst_enquiry_form_column_order = $request->getParameter('borst_enquiry_form_column_order');
        $set_column = 'borst_enquiry_form_column';
        $set_column_order = 'borst_enquiry_form_column_order';

        $order = $profile->setSortingParameters($page, $borst_enquiry_form_column_order,
            $column_id, $current_column, $set_column, $set_column_order);

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $contactEnquiry->updateEnquiryRecords($arr);
            $query = $contactEnquiry->getSearchedEnquiryParameterString($arr, $column_id, $order);
        }

        $this->pager = $mymarket->getPagerForAll('ContactEnquiry', 10, $query, $request->
            getParameter('page', 1));

        $this->column_id = $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;
        $this->ans_type = $arr['ans_type'];
    }


    /**
     * 
     * This function displays enquiry in detail.
     * 
     */
    public function executeEnquiryDetails(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_contact_enquiry');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $contactEnquiry = new ContactEnquiry();
        $contactEnquiryPost = new ContactEnquiryPost();
        $mymarket = new mymarket();

        $enq_id = $request->getParameter('enq_id');
        $this->enquiry_details_data = $contactEnquiry->fetchEnquiryRec($enq_id);
        if($enq_id){
            $contactEnquiry->increaseViewCount($enq_id);
        }
        
        $this->form = new ContactEnquiryPostForm();
        $this->wSchema = $this->form->getWidgetSchema();
        $this->wSchema['enq_id'] = new sfWidgetFormInputHidden();
        $this->wSchema['title'] = new sfWidgetFormInputHidden();
        $this->wSchema['author_name'] = new sfWidgetFormInputHidden();
        
        $isSuperAdmin = $this->getUser()->getAttribute('isSuperAdmin', '' , 'userProperty');
        $fasterAnsFlag = $this->enquiry_details_data->getFasterAnsFlag();
        if($isSuperAdmin){
            $this->form->setDefault('author_name', $this->getUser()->getAttribute('firstname', '', 'userProperty').' '.$this->getUser()->getAttribute('lastname', '', 'userProperty') );
        }else {
            if($fasterAnsFlag == 2){
                $this->form->setDefault('author_name', $this->getUser()->getAttribute('firstname', '', 'userProperty') );
            }else if($fasterAnsFlag == 3){
                $this->form->setDefault('author_name',  $this->enquiry_details_data->getUserSignature());
            }else {
                $this->form->setDefault('author_name', $this->getUser()->getAttribute('firstname', '', 'userProperty').' '.$this->getUser()->getAttribute('lastname', '', 'userProperty') );
            }        
        }
        
        $this->form->setDefault('reply_date', date("Y-m-d H:i:s"));
        $this->form->setDefault('enq_id', $enq_id);
        $this->form->setDefault('admin_or_user', 1);
        $this->form->setDefault('title', '');

        $query = $contactEnquiryPost->fetchEnquiryReplyQuery($enq_id);
        $this->pager = $mymarket->getPagerForAll('ContactEnquiryPost', '5', $query, $request->
            getParameter('page', 1));
    }


    /**
     * 
     * This function gives the list of reply on any enquiry.
     * 
     */
    public function executeReplyListOnEnquiry(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $enq_id = $request->getParameter('enq_id');
        $mymarket = new mymarket();
        $contactEnquiryPost = new ContactEnquiryPost();

        $this->form = new ContactEnquiryPostForm();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $reply_data = $request->getParameter($this->form->getName());
            //$this->form->bind($reply_data);
            $contactEnquiryPost->saveReplyData($arr, $reply_data);
            $contactEnquiry = new ContactEnquiry();
            $replyCount = $contactEnquiry->getReplyCount($enq_id);
            $total = 0;
		
            if($replyCount)
            {
                    $total = $replyCount;
                    $contactEnquiry_update = Doctrine_Query::create()
                                                            ->update('ContactEnquiry ce')
                                                            ->set('ce.replycount', '?', $total)
                                                            ->where('ce.id = ?', $enq_id);

                    $updated = $contactEnquiry_update->execute();
            }
        }

        // Deleting a reply post on enquiry.
        if ($request->getParameter('delete_post_id'))
            $contactEnquiryPost->deleteEnquiryReplyPost($request->getParameter('delete_post_id'));

        $query = $contactEnquiryPost->fetchEnquiryReplyQuery($enq_id);
        $this->pager = $mymarket->getPagerForAll('ContactEnquiryPost', '5', $query, $request->
            getParameter('page', 1));
    }

    /**
     * 
     * This function fetches the posted comment of a perticular enquiry.
     * 
     */
    public function executeGetEnquiryCommentData(sfWebRequest $request)
    {
        $editpost_id = $this->getRequestParameter('editpost_id');
        $editpost_id = trim(str_replace('editpost', '', $editpost_id));

        $enq_post = new ContactEnquiryPost();
        $post_data = $enq_post->getSelectedEnquiryPost($editpost_id);
        return $this->renderText($post_data);
    }


    /**
     * Executes EditObject action
     *
     * @param sfRequest $request A request object
     */
    public function executeEditObject(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_list_object');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $this->title = '';

        $mode = $this->getRequestParameter('mode');
        if ($mode == 'create_new_object') {
            $this->title = 'Create';
            $this->objectForm = new ObjektForm();
            $this->objectForm->setDefault('object_date', date("Y-m-d H:i:s"));
        }
        if ($mode == 'edit_object') {
            $this->title = 'Edit';
            $obj = new Objekt();
            $object_data = $obj->getSelectedObject($this->getRequestParameter('object_id'));
            $this->objectForm = new ObjektForm($object_data);

            $this->objectForm->setDefault('object_id', $object_data->object_id);
            $this->objectForm->setDefault('object_date', date("Y-m-d H:i:s"));
        }

        if ($request->isMethod('post')) {
            $objectForm_arr = $request->getParameter($this->objectForm->getName());
            $this->objectForm->bind($objectForm_arr);

            if ($this->objectForm->isValid()) {
                $record = $this->objectForm->save();
                //$this->forward('borst', 'listObject');
                $this->redirect('borst/listObject');
            }
        }
    }

    /**
     * Executes IsObjectExsist action
     *
     * @param sfRequest $request A request object
     */
    public function executeCheckForObject(sfWebRequest $request)
    {
        $object_name = $this->getRequestParameter('object_name');
        $object_country = $this->getRequestParameter('object_country');
        $object_id = $this->getRequestParameter('object_id');

        $obj = new Objekt();
        $error_arr = array();
        $str = '';

        $str = $obj->isObjectPresent($object_name, $object_country, $object_id);

        return $this->renderText($str);
    }

    /**
     * Executes DeleteTemplate action
     *
     * @param sfRequest $request A request object
     */
    public function executeDeleteTemplate(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_create_article');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();
        $article_id = $request->getParameter('template_id');
        $article = Doctrine::getTable('ArticleTemplate')->findByTemplateId($article_id);

        if ($article) {
            $this->article_message = 'bort mall ' . $article->getTemplateName() .
                ' framgångsrikt.';
            $article->delete();

        } else {
            $this->article_message = 'kunde inte hitta mallen.';
        }

    }

    /**
     * Executes CheckForCategory action
     *
     * @param sfRequest $request A request object
     */
    public function executeCheckForCategory(sfWebRequest $request)
    {
        $category_name = $this->getRequestParameter('category_name');

        $articleCategory = new ArticleCategory();
        if ($category_name)
            $return_data = $articleCategory->isCategoryPresent($category_name);

        return $this->renderText($return_data);
    }

    /**
     * Executes CheckForType action
     *
     * @param sfRequest $request A request object
     */
    public function executeCheckForType(sfWebRequest $request)
    {
        $type_name = $this->getRequestParameter('type_name');

        $articleType = new ArticleType();
        if ($type_name)
            $return_data = $articleType->isTypePresent($type_name);

        return $this->renderText($return_data);
    }

    /**
     * 
     * This function fetches the date of a perticular user for editing.
     * 
     */
    public function executeEditProfile(sfWebRequest $request)
    {
        isicsBreadcrumbs::getInstance()->addItem('Sister BT Min Profile',
            'sbt/sbtMinProfile');

        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_user_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        $this->logged_user = $this->getUser()->getAttribute('user_id', '',
            'userProperty');
        $arrLand = array('1' => 'Sverige', '2' => 'Norge', '3' => 'Finland', '4' =>
            'Danmark', '5' => 'Other');
        $arrBirthDate = $my_five_best_recommendations = $my_shortlist = $profileForm_arr =
            $sbtBlogProfile_arr = array();
        $arrProfileCheck = array('', 'Required',
            'Symboler eller specialtecken är inte tillåtna');
        $arrNumberCheck = array('', 'Required', 'Bara siffror är tillåtna');
        $error_flag = $j = $k = $user_email_flag = 0;
        $recomm_str = $shortlist_str = '';

        for ($i = 1910; $i <= 1986; $i++) {
            $arrBirthDate[$i] = $i;
        }

        $id = $this->getRequestParameter('edit_user_id');
        $profile = new SfGuardUserProfile();
        $sbt_blog_profile = SbtBlogProfileTable::getInstance()->fetchBlogProfile($id);

        $this->blog_info_div = $sbt_blog_profile ? 'show' : 'hide';
        $this->user_data = $profile->getUserData($id);
        $user_Email = $this->user_data->getEmail() ;
        /*$sfGuardUser = $profile->fetch_user($this->user_data->username);
        $this->userForm = new sfGuardUserForm($sfGuardUser);
        $this->wSchema = $this->userForm->getWidgetSchema();
        $this->wSchema['password'] = new sfWidgetFormInputHidden();*/

        $this->profileForm = new AddSfGuardUserProfileForm($this->user_data);
        $this->wSchema = $this->profileForm->getWidgetSchema();
        //$this->wSchema['email'] = new sfWidgetFormInputHidden();
        $this->wSchema['year_of_birth']->setOption('choices', $arrBirthDate);
        $this->wSchema['land']->setOption('choices', $arrLand);
        $this->profileForm->setDefault('land', $this->user_data->land);
        $this->profileForm->setDefault('year_of_birth', $this->user_data->year_of_birth);
        $this->gender = $this->user_data->gender;

        $this->sbtBlogProfileForm = new AddSbtBlogProfileForm($sbt_blog_profile);
        $this->wSchema = $this->sbtBlogProfileForm->getWidgetSchema();
        $this->sbtBlogProfileForm->setDefault('user_id', $id);

        $this->type_of_speculator = $sbt_blog_profile->type_of_speculator;
        $this->my_trade = $sbt_blog_profile->my_trade;
        $this->my_occupation = $sbt_blog_profile->my_occupation;
        $this->is_millionaire = $sbt_blog_profile->is_millionaire;
        $this->my_five_best_recommendations = explode(',', $sbt_blog_profile->
            my_five_best_recommendations);
        $this->my_shortlist = explode(',', $sbt_blog_profile->my_shortlist);

        if ($request->isMethod('post')) {
                    //if ($this->profileForm->isValid()) {

                    
                
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            //$userForm_arr = $request->getParameter($this->userForm->getName());
            $profileForm_arr = $request->getParameter($this->profileForm->getName());
            //echo "<pre>"; print_r($profileForm_arr['email']); die;
            $sbtBlogProfile_arr = $request->getParameter($this->sbtBlogProfileForm->getName
                ());
            $prof_user = new SfGuardUserProfile();

            //code change by sandeep
            /*$this->email_red = $prof_user->checkEmailEditProfile($profileForm_arr);
            if($this->email_red != '')
            {
                    $error_flag = 1;
            }*/
            
            
            $this->hide_username_error = 'display:block';

            $this->checked = "";
            $this->username_red = $prof_user->checkUsernameForEditUser($profileForm_arr);
            $this->email_red = $prof_user->checkEmailForEditUser($profileForm_arr);

            if($this->username_red=='' && $this->email_red=='')
            {
                $error_flag = 0;                
            }
            else
            {
                $error_flag = 1;
            }            
            //code change by sandeep end
            // Checking profile fields
            $this->firstname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['firstname'])];
            $this->lastname_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['lastname'])];
            $this->street_error = $arrProfileCheck[$prof_user->checkScriptTags($profileForm_arr['street'])];
            $this->zipcode_error = $arrNumberCheck[$prof_user->checkZipcode($profileForm_arr['zipcode'])];
            $this->phone_error = $arrNumberCheck[$prof_user->checkZipcode($profileForm_arr['phone'])];

            $first_error_val = $prof_user->checkScriptTags($profileForm_arr['firstname']);
            $lastname_error_val = $prof_user->checkScriptTags($profileForm_arr['lastname']);
            $street_error_val = $prof_user->checkScriptTags($profileForm_arr['street']);
            $zipcode_error_val = $prof_user->checkZipcode($profileForm_arr['zipcode']);
            $phone_error_val = $prof_user->checkZipcode($profileForm_arr['phone']);

            if ($first_error_val > 0 || $lastname_error_val > 0 || $street_error_val > 0 ||
                $zipcode_error_val > 0 || $phone_error_val > 0) {
                $error_flag = 1;
            }

            // Weither to show the blog info part or not.
            if ($arr['type_of_speculator'] || $arr['my_trade'] || $arr['my_occupation'] || $arr['is_millionaire'] ||
                $sbtBlogProfile_arr['my_own_writing'] != '' || $sbtBlogProfile_arr['broker_used'] !=
                '' || $sbtBlogProfile_arr['my_best_trade'] != '' || $sbtBlogProfile_arr['my_worst_trade'] !=
                '' || $sbtBlogProfile_arr['my_five_best_recommendations'] != '' || $sbtBlogProfile_arr['my_shortlist'] !=
                '') {
                $this->blog_info_div = 'show';
            }

            //if($user_email_flag == 1 && $error_flag == 0) $userForm_arr["username"] = $profileForm_arr['email'];

            /* Checking Blog rights information filled by user. */
            if ($sbtBlogProfile_arr['my_own_writing'] != '' || $arr['type_of_speculator'] !=
                '' || $sbtBlogProfile_arr['broker_used'] != '' || $arr['my_trade'] != '' || $arr['my_occupation'] !=
                '' || $arr['is_millionaire'] != '' || $sbtBlogProfile_arr['my_best_trade'] != '' ||
                $sbtBlogProfile_arr['my_worst_trade'] != '') {
                $this->my_own_writing_error = empty($sbtBlogProfile_arr['my_own_writing']) ?
                    'Required' : '';
                $this->type_of_speculator_error = empty($arr['type_of_speculator']) ? 'Required' :
                    '';
                $this->broker_used_error = empty($sbtBlogProfile_arr['broker_used']) ?
                    'Required' : '';
                $this->my_trade_error = empty($arr['my_trade']) ? 'Required' : '';
                $this->my_occupation_error = empty($arr['my_occupation']) ? 'Required' : '';
                $this->is_millionaire_error = empty($arr['is_millionaire']) ? 'Required' : '';
                $this->my_best_trade_error = empty($sbtBlogProfile_arr['my_best_trade']) ?
                    'Required' : '';
                $this->my_worst_trade_error = empty($sbtBlogProfile_arr['my_worst_trade']) ?
                    'Required' : '';

                if ($this->my_own_writing_error != '' || $this->type_of_speculator_error != '' ||
                    $this->broker_used_error != '' || $this->my_trade_error != '' || $this->
                    my_occupation_error != '' || $this->is_millionaire_error != '' || $this->
                    my_best_trade_error != '' || $this->my_worst_trade_error != '') {
                    $error_flag = 1;
                }

            }

            // Collecting SisterBT blog rights data.
            $sbtBlogProfile_arr['type_of_speculator'] = $arr['type_of_speculator'];
            $sbtBlogProfile_arr['my_trade'] = $arr['my_trade'];
            $sbtBlogProfile_arr['my_occupation'] = $arr['my_occupation'];
            $sbtBlogProfile_arr['is_millionaire'] = $arr['is_millionaire'];

            for ($i = 1; $i <= 5; $i++) {
                $recomm = trim($arr['recomm_' . $i]);

                if ($recomm != " " && strlen($recomm) > 0) {
                    if ($j != 0)
                        $recomm_str = $recomm_str . "," . $recomm;
                    else
                        $recomm_str = $recomm;

                    $j++;
                }

                $shortlist = trim($arr['shortlist_' . $i]);

                if ($shortlist != " " && strlen($shortlist) > 0) {
                    if ($k != 0)
                        $shortlist_str = $shortlist_str . "," . $shortlist;
                    else
                        $shortlist_str = $shortlist;

                    $k++;
                }
            }

            $sbtBlogProfile_arr['my_five_best_recommendations'] = $recomm_str;
            $sbtBlogProfile_arr['my_shortlist'] = $shortlist_str;
            //$profileForm_arr['username'] = $uname;

            //$this->userForm->bind($userForm_arr);

            //if($this->userForm->isValid())
            //{
            if ($error_flag == 0) {
                $this->profileForm->bind($profileForm_arr);
                $this->sbtBlogProfileForm->bind($sbtBlogProfile_arr);
                $this->profileForm->save();
                $this->sbtBlogProfileForm->save();
                
                //code change by sandeep
                $updated_email = $profileForm_arr['email'];
                $updated_username = $profileForm_arr['username'];
                $contactEnquiry = new ContactEnquiry();
                $EmailInContactEnquiry = $contactEnquiry->checkEmailInContactEnquiry($user_Email);
                if($EmailInContactEnquiry){
                    foreach($EmailInContactEnquiry as $cemail){
                         $rows	= Doctrine_Query::create()
                                            ->update('ContactEnquiry')
                                            ->set('email', '?', $updated_email)
                                            ->where('id = ?', $cemail['id'])
                                            ->execute();
                    }
                }
                
                
                $newsletterAccount = new NewsletterAccount();
                $EmailInNewsletterAccount = $newsletterAccount->checkEmailInNewsletterAccount($user_Email);
                if($EmailInNewsletterAccount){
                    foreach($EmailInNewsletterAccount as $naemail){
                         $rows1	= Doctrine_Query::create()
                                            ->update('NewsletterAccount')
                                            ->set('email', '?', $updated_email)
                                            ->where('id = ?', $naemail['id'])
                                            ->execute();
                    }
                }
                
                
                $newsletterPublic = new NewsletterPublic();
                $EmailInNewsletterPublic = $newsletterPublic->checkEmailInNewsletterPublic($user_Email);
                if($EmailInNewsletterPublic){
                    foreach($EmailInNewsletterPublic as $npemail){
                         $rows2	= Doctrine_Query::create()
                                            ->update('NewsletterPublic')
                                            ->set('email', '?', $updated_email)
                                            ->where('id = ?', $npemail['id'])
                                            ->execute();
                    }
                }
                
                if($id){
                $rows3	= Doctrine_Query::create()
                                            ->update('SfGuardUser')
                                            ->set('username', '?', $updated_username)
                                            ->where('id = ?', $id)
                                            ->execute();
                }
                //code change by sandeep end
                $url = 'http://' . $this->host_str . '/backend.php/borst/userList';
                $this->redirect($url);
            }
            //}
            
        }

        $this->user_id = $id;
        $this->action = 'sbtMinProfile';
    }

    public function executeUpdateUserName(sfWebRequest $request)
    {echo "hello";
            $userName = $request->getParameter('userName');
            $userId = $request->getParameter('userId');
            var_dump($userName);
            $rows2	= Doctrine_Query::create()
                            ->update('SfGuardUserProfile')
                            ->set('username', '?', $userName)
                            ->where('user_id = ?', $userId)
                            ->execute();
           //die;
    }
    
    /**
     * Executes viewAccount action
     *
     * @param sfRequest $request A request object
     */
    public function executeViewAccount(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $this->id = $this->getRequestParameter('id');
    }

    /*
    * Executes UserSubscription action
    *
    * This function is used While saving vote for Blog.
    */
    public function executeUserSubscription(sfWebRequest $request)
    {
        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();
        $profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        $this->host_str = $this->getRequest()->getHost();

        $user_id = $request->getParameter('id');
        $pur_id_arr = $this->purchase->getPurchaseOrderOfUser($user_id);
        $pur_id_str = implode(",", $pur_id_arr);
        $user_id = $this->getUser()->getAttribute('user_id', '', 'userProperty');
        if (count($pur_id_arr) > 0)
         $query = $subscription->getAllSubscriptionOfUserQueryByOrder($pur_id_str,$user_id);
        
        // echo $query->getSqlQuery();die;
        if (count($pur_id_arr) > 0)
            $this->pager = $mymarket->getPagerForAll('Subscription', 20, $query, $request->getParameter('page', 1));
        else
            $this->pager = null;

        $this->acc_id = $user_id;
    }

    /*
    * Executes FetchMoreUserSubscription action
    *
    * This function is used While saving vote for Blog.
    */
    public function executeFetchMoreUserSubscription(sfWebRequest $request)
    {
        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();
        $profile = new SfGuardUserProfile();
        $mymarket = new mymarket();
        $this->host_str = $this->getRequest()->getHost();

        $user_id = $request->getParameter('id');
        $pur_id_arr = $this->purchase->getPurchaseOrderOfUser($user_id);
        $pur_id_str = implode(",", $pur_id_arr);

        if (count($pur_id_arr) > 0)
            $query = $subscription->getAllSubscriptionOfUserQueryByOrder($pur_id_str);

        if (count($pur_id_arr) > 0)
            $this->pager = $mymarket->getPagerForAll('Subscription', 20, $query, $request->
                getParameter('page', 1));
        else
            $this->pager = null;

        $this->acc_id = $user_id;
    }

    /**
     * Executes CreateShopArticle action
     *
     * @param sfRequest $request A request object
     */
    public function executeCreateShopArticle(sfWebRequest $request)
    {
        
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'btshop_article');
        $this->host_str = $this->getRequest()->getHost();
        $price_details = new BtShopPriceDetails();
        $btShopArticle = new BtShopArticle();
        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();

        $this->qty_list = $btShopPriceQtyUnit->getAllQtyUnits();
        $this->article_id = $edit_shop_article_id = $request->getParameter('edit_shop_article_id');
        $this->shopId = $edit_shop_article_id;
        $shopdata = $btShopArticle->getPerticularShopArticle($edit_shop_article_id);

        if($edit_shop_article_id)
        {
            $this->is_sellable = $shopdata['is_sellable'];
        }
        else
        {
            $this->is_sellable = $shopdata['is_sellable'] =1;
        }
        $this->shop_article_pub_status = $shopdata ? $shopdata->published : 0;

        if ($edit_shop_article_id) {
            $chart_combos = $btShopArticle->getChartCombosInformation($edit_shop_article_id);
            if ($chart_combos) {
                $chart_obt = new BtchartType();
                $chart_types = $chart_obt->getPaidChartTypes();
                $this->chart_types = $chart_types;
                $this->setCombos = 1;
                $this->selected_chart = $chart_combos;
            } else
                $this->setCombos = 0;

            //print_r($shopdata);
            $this->form = new BtShopArticleForm($shopdata);

            if (!$this->getUser()->getAttribute('product_image', '', 'userProperty'))
                $this->getUser()->setAttribute('product_image', $shopdata->btshop_product_image,
                    'userProperty');
        } else {
            $this->form = new BtShopArticleForm();
        }

        $this->form->setDefault('btshop_article_author_id', $this->getUser()->
            getAttribute('user_id', '', 'userProperty'));

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $form_arr = $request->getParameter($this->form->getName());
            $form_arr['btchart_type_id'] = $request->getParameter('chart_type_id', 0);

            $form_arr['published'] = $arr['shop_art_status'] ? $arr['shop_art_status'] : 0;
            $form_arr['created_at'] = date("Y-m-d H:i:s");

            $this->form->bind($form_arr);
            if ($this->form->isValid())
            {
                $record = $this->form->save();
                $price_details->updateSelectedPrice($record->id, $arr);
                $this->getUser()->setAttribute('product_image', '', 'userProperty');
                if(isset($arr['save_form']))
                {
                    if($edit_shop_article_id)
                    {
                        $this->is_sellable = $shopdata['is_sellable'];
                    }
                    else
                    {
                        $this->is_sellable = $shopdata['is_sellable'] =1;
                    }
                    $this->isSaved = 1;
                    $url = 'http://' . $this->host_str.
                                '/backend.php/borst/CreateShopArticle/edit_shop_article_id/' . $edit_shop_article_id;
                }
                else
                {
                    $this->forward('borst', 'shopArticleList');
                }
            }
           
          
         
        }

    }

    /**
     * Executes CreateCoupon action
     *
     * @param sfRequest $request A request object
     */
    public function executeAddUpdateCoupon(sfWebRequest $request)
    {        
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'coupon');
        $this->host_str = $this->getRequest()->getHost();
        $price_details = new BtShopPriceDetails();
        $btShopArticle = new BtShopArticle();
        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();

        $coupon_id = $request->getParameter('id');

        if ($coupon_id) {
            $coupon_data =  Doctrine_Core::getTable('Coupon')->findOneById($coupon_id);
            $this->form = new CouponForm($coupon_data);
        } else {
            $this->form = new CouponForm();
        }

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));

            if ($this->form->isValid()) {
                    $record = $this->form->save();
                    //if(!$coupon_id){
                        $couponcode_id = $this->form->getObject()->getId();
                        $code = $this->form->getObject()->getCode();
                        $coupon_desc = $this->form->getObject()->getCodeDesc();
                        $coupon_code = $code.'_'.$coupon_desc;
                        
                        $rows	= Doctrine_Query::create()
					->update('Coupon')
					->set('coupon_code', '?', $coupon_code)
					->where('id = ?', $couponcode_id)
                                        ->set('updated_at', '?', date('Y-m-d H:i:s'))
					->execute();
                    //}                    
                    $this->redirect('borst/couponList');
            }
        }

    }
    
    
    public function executeSendCouponCode(sfWebRequest $request)
    {        
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'coupon');
        $this->host_str = $this->getRequest()->getHost();
        $this->msg = '';
        $coupon = new Coupon();
        $this->product = new BtShopArticle();
        $this->couponCode = $coupon->getAllCouponCode();
        $this->subscription_types = $this->product->getAllShopArticleTitle();
        $redirect = $this->getUser()->getAttribute('redirect_code');
        $coupondetail_id = $request->getParameter('id');
        $this->coupondetail_id = $request->getParameter('id');
        if ($coupondetail_id) {
            $this->coupondetails_data =  $coupon->getOneSendCouponQuery($coupondetail_id);//Doctrine_Core::getTable('CouponDetails')->findOneById($coupondetail_id);
        }else{
            $this->coupondetails_data = '';
        }
        if ($request->isMethod('post')) {
            $valid = true;
            $c_code = true;
            if($request->getParameter('email_list')){
                foreach(explode(",", $request->getParameter('email_list')) as $email){
                   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                       {
                         $valid = false;
                       }
                }
            }
            if($request->getParameter('coupon_code')==''){
                $c_code = false;
            }
            if(!$valid) {
                $this->msg = 'Please enter valid email id';
                $this->value = $request->getParameter('email_list');                
            }else if(!$c_code && !$coupondetail_id) {
                $this->msg_code = 'Please select coupon code';               
            }
            else{
                $email_list =$request->getParameter('email_list');
                $coupon_code =$request->getParameter('coupon_code');
                $prod_id =$request->getParameter('subscription_types');
                $is_inactive =$request->getParameter('is_inactive');
                $email =$request->getParameter('email_list');
                $status =$request->getParameter('status');
                
                if($coupondetail_id){
                        $rows	= Doctrine_Query::create()
					->update('CouponDetails')
					//->set('product_id', '?', $prod_id)
                                        //->set('couponcode_id', '?', $coupon_code)
                                        //->set('email', '?', $email)
                                        ->set('is_inactive', '?', $is_inactive)
                                        ->set('status', '?', $status)
                                        //->set('created_at', '?', date('Y-m-d H:i:s'))
                                        ->set('updated_at', '?', date('Y-m-d H:i:s'))
					->where('id = ?', $coupondetail_id)
					->execute();
                }else{
                    foreach(explode(",", $email_list) as $email){

                        $purchase = new CouponDetails();
                        $purchase->user_id = 0;
                        $purchase->product_id = $prod_id;
                        $purchase->couponcode_id = $coupon_code;
                        $purchase->email = $email;
                        $purchase->status = 'Pending';
                        $purchase->is_inactive = $is_inactive;
                        $purchase->created_at = date('Y-m-d H:i:s');
                        $purchase->updated_at = date('Y-m-d H:i:s');
                        $purchase->save(); 
                    }
                }
                $this->msg = 'valid';
                $this->value = $request->getParameter('email_list');
                if(!$coupondetail_id || $redirect == 'sendCouponList'){
                    $this->redirect('borst/sendCouponList');
                }else{
                    $this->redirect('borst/usedCouponList');
                }
            }
        }        
    }
    
    public function executeCouponList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'coupon');
        $this->host_str = $this->getRequest()->getHost();
        
        $coupon = new Coupon();

        $query = $coupon->getAllCouponQuery();
        $mymarket = new mymarket();

        $this->pager = $mymarket->getPagerForAll('Subscription', 50, $query, $request->getParameter('page', 1));
        
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            if ($arr) {
                if($arr['coupon_ids']){
                    foreach ($arr['coupon_ids'] as $key => $value) {
                        $deleted_coupon_details_data = Doctrine_Query::create()
                                ->delete()
                                ->from('CouponDetails')
                                ->where('couponcode_id = ' . $value)
                                ->execute();
                       
                        $delete_coupon_code_data = Doctrine_Query::create()
                                ->delete()
                                ->from('Coupon')
                                ->where('id = ' . $value)
                                ->execute();
                    }
                }
            }
        }
    }

    /*
    *
    * This function is used for listing Subscription list.
    *
    */
    public function executeGetCouponListData(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        
        $subscription = new Coupon();
        

         
       $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        if ($request->getParameter('page') > 0) {
            $page = $request->getParameter('page');
        } else {
            $page = 1;
        }
        if ($request->getParameter('ordertype')!='') {
            $order = $request->getParameter('ordertype');
        } else {
            $order = 'DESC';
        }

        $query = $subscription->getSubscriptionOfUserQuery($column_id, $order);

        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Subscription', 50, $query, $page);

        $this->selected_subscription_type = $selected_subscription_type;
        $this->column_id = $column_id;
        $this->current_column_order = $order=='ASC'?'DESC':'ASC';
        $this->cur_column = $current_column;
        $this->page = $page;
        //$this->subscription_types = $this->product->getAllShopArticleTitle();
    }
    
    //code  by sandeep
    public function executeDeleteSendCode(sfWebRequest $request)
    {
            $messageId = $request->getParameter('is_archive');
            $deletedreceipient = Doctrine_Query::create()
                ->delete()
                ->from('CouponDetails')
                ->andWhere('id = '.$messageId)
                ->execute();

           
            $this->forward('borst', 'couponList');
    }
    
    public function executeDeleteCode(sfWebRequest $request)
    {
            $coupon_code_id = $request->getParameter('is_archive');
            if($coupon_code_id){
                $deleted_coupon_details_Data = Doctrine_Query::create()
                        ->delete()
                        ->from('CouponDetails')
                        ->andWhere('couponcode_id = ' . $coupon_code_id)
                        ->execute();
                
                $delete_coupon_code_data = Doctrine_Query::create()
                        ->delete()
                        ->from('Coupon')
                        ->andWhere('id = ' . $coupon_code_id)
                        ->execute();
        }           
        $this->forward('borst', 'couponList');
    }
    
    public function executeSendCouponList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'coupon');
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('redirect_code', 'sendCouponList');
        
        $this->moduleurl = 'borst/sendCouponList';
        $module_url			= $this->getController()->genUrl('borst/sendCouponList');
        $this->sortOrder	= ''; 			// getting the value for shorting order
	$this->sortBy		= ''; 			// getting the value for shorting by
	$this->queryString	= '';			// definiong query sting value
        $couponcode		= 'all';
        $couponstatus   	= 'all';
        if ($request->getParameter('page') == "") {
            $this->Cpage = 1;
        } else {
            $this->Cpage = $request->getParameter('page');
        }

  	$queryForCouponCodeList		= Doctrine_Query::create()
                                            ->from('Coupon c')
                                            ->orderBy('c.created_at DESC');	
	
	$CouponCode_list_array	= $queryForCouponCodeList->fetchArray();
	$CouponCode_lists			= array('all' => "All Coupon Code");
	foreach($CouponCode_list_array as $CouponCode_lists_list) {
		$CouponCode_lists[$CouponCode_lists_list['id']]	= $CouponCode_lists_list['coupon_code'];
        }
        $couponstatus_lists	= array('all' => "All Coupon Status", 'Pending'=>'Pending');
	### Creating Filter Forms
	$this->filterform	= new CouponCodeFilterForm();
	$this->filterform->setDefault('submit_values', 'yes');
	$this->filterform->getWidget('couponcode')->setAttribute('onchange', "doCouponCodeFilter('$module_url', '#couponcode');");
	$this->filterform->getWidget('couponcode')->setOption('choices', $CouponCode_lists);
        $this->filterform->getWidget('couponstatus')->setAttribute('onchange', "doCouponCodeFilter('$module_url', '#couponstatus');");
	$this->filterform->getWidget('couponstatus')->setOption('choices', $couponstatus_lists);
        
        if ($request->getParameter('submit_values') == 'yes') {
            $this->queryString .= '&submit_values=' . $request->getParameter('submit_values');
            $couponcode                  = $request->getParameter('couponcode');
            $couponstatus                = $request->getParameter('couponstatus');
            $this->queryString		.= '&couponcode='.$couponcode;             
            $this->queryString		.= '&couponstatus='.$couponstatus;
        }
        $this->filterform->getWidget('couponcode')->setOption('default', $couponcode);
        $this->filterform->getWidget('couponstatus')->setOption('default', $couponstatus);
        
        $coreQuery = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
                cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
                cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
                c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
                c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT ,
                bt.id as bt_id, bt.btshop_article_title as bt_btshop_article_title 
                FROM coupon_details cd 
                LEFT JOIN coupon c ON c.id=cd.couponcode_id 
                LEFT JOIN btshop_article bt ON bt.id=cd.product_id ";
        
        ### ALL WHERE
	$Where="";	
	
        $Where.=' cd.status = "Pending"';       
        
	if($couponcode!='all') {
		$Where.=' AND c.id ='.$couponcode;
	}
        
	$FinalWhere="";
	
	if($Where!=""){
            $FinalWhere= " WHERE ".$Where;
	}
        $OrderBy="";	
	if($request->getParameter('sort')=='yes') {
	
		$this->sortOrder	= $request->getParameter('order');
		$this->sortBy		= $request->getParameter('sortby');
		
		$this->queryString	.= '&sort=yes&sortby='.$this->sortBy.'&order='.$this->sortOrder;
		
		if($this->sortBy=='product') {		
			$OrderBy.="bt.btshop_article_title $this->sortOrder";
		}else if($this->sortBy=='coupon_code') {		
			$OrderBy.="c.coupon_code $this->sortOrder";
		}else if($this->sortBy=='email') {		
			$OrderBy.="cd.email $this->sortOrder";
		}else if($this->sortBy=='active') {		
			$OrderBy.="cd.IS_INACTIVE $this->sortOrder";
		}else {
                        // Default Order of sorting
			$OrderBy.="cd.CREATED_AT DESC";
		}
	}else {
                        // Default Order of sorting
			$OrderBy.="cd.CREATED_AT DESC";
	}
        
        $this->PageLimit = 50;
        $start = 0;
        if (@$this->Cpage != "") {
            $start = ($this->Cpage - 1) * $this->PageLimit;
        } else {
            $start = 0;
        }

        $QLimit = " LIMIT " . $start . ", " . $this->PageLimit;        

        ### FINAL ADDING
        $con = Doctrine_Manager::getInstance()->connection();
        $FinalQuery = $coreQuery .$FinalWhere. " ORDER BY " . $OrderBy . $QLimit;
        $this->ResFinal = $con->fetchAll($FinalQuery);
        $QForLimit = $coreQuery .$FinalWhere. " ORDER BY " . $OrderBy;
        $ResForLimit = $con->fetchAll($QForLimit);
        $this->Rtotal = count($ResForLimit);
        $this->NumPage = ceil($this->Rtotal / $this->PageLimit);
        $this->Cpage = $request->getParameter('page', 1);
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            if ($arr['coupon_ids']) {
                foreach ($arr['coupon_ids'] as $key => $value) {
                    $deletedreceipient = Doctrine_Query::create()
                            ->delete()
                            ->from('CouponDetails')
                            ->andWhere('id = '.$value)
                            ->execute();
                }
            }
        }
        if ($request->isXmlHttpRequest()) {
            return $this->renderPartial('borst/send_coupon_list_partial', array(
                        'filterform' => $this->filterform,
                        'ResFinal' => $this->ResFinal,
                        'queryString' => $this->queryString,
                        'sortOrder' => $this->sortOrder,
                        'sortBy' => $this->sortBy,
                        'NumPage' => $this->NumPage,
                        'PageLimit' => $this->PageLimit,
                        'Rtotal' => $this->Rtotal,
                        'Cpage' => $this->Cpage,
                        'sort_message' => $this->sort_message,
                        'moduleurl' => $this->moduleurl
            ));
        }
    }
    
    public function executeUsedCouponList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'coupon');
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('redirect_code', 'usedCouponList');
        
        $this->moduleurl = 'borst/usedCouponList';
        $module_url			= $this->getController()->genUrl('borst/usedCouponList');
        $this->sortOrder	= ''; 			// getting the value for shorting order
	$this->sortBy		= ''; 			// getting the value for shorting by
	$this->queryString	= '';			// definiong query sting value
        $couponcode		= 'all';
        $couponstatus   	= 'all';
        if ($request->getParameter('page') == "") {
            $this->Cpage = 1;
        } else {
            $this->Cpage = $request->getParameter('page');
        }

  	$queryForCouponCodeList		= Doctrine_Query::create()
                                            ->from('Coupon c')
                                            ->orderBy('c.created_at DESC');	
	
	$CouponCode_list_array	= $queryForCouponCodeList->fetchArray();
	$CouponCode_lists			= array('all' => "All Coupon Code");
	foreach($CouponCode_list_array as $CouponCode_lists_list) {
		$CouponCode_lists[$CouponCode_lists_list['id']]	= $CouponCode_lists_list['coupon_code'];
        }
        $couponstatus_lists	= array('all' => "All Coupon Status", 'Inprocess'=>'Inprocess','Completed'=>'Completed','Done'=>'Done');
	### Creating Filter Forms
	$this->filterform	= new CouponCodeFilterForm();
	$this->filterform->setDefault('submit_values', 'yes');
	$this->filterform->getWidget('couponcode')->setAttribute('onchange', "doCouponCodeFilter('$module_url', '#couponcode');");
	$this->filterform->getWidget('couponcode')->setOption('choices', $CouponCode_lists);
        $this->filterform->getWidget('couponstatus')->setAttribute('onchange', "doCouponCodeFilter('$module_url', '#couponstatus');");
	$this->filterform->getWidget('couponstatus')->setOption('choices', $couponstatus_lists);
        
        if ($request->getParameter('submit_values') == 'yes') {
            $this->queryString .= '&submit_values=' . $request->getParameter('submit_values');
            $couponcode                  = $request->getParameter('couponcode');
            $couponstatus                = $request->getParameter('couponstatus');
            $this->queryString		.= '&couponcode='.$couponcode;             
            $this->queryString		.= '&couponstatus='.$couponstatus;
        }
        $this->filterform->getWidget('couponcode')->setOption('default', $couponcode);
        $this->filterform->getWidget('couponstatus')->setOption('default', $couponstatus);
        
        $coreQuery = "SELECT cd.id as cd_id, cd.user_id as cd_user_id, cd.product_id as cd_product_id,
                cd.couponcode_id as cd_couponcode_id, cd.email as cd_email, cd.status as cd_status, 
                cd.IS_INACTIVE as cd_IS_INACTIVE, cd.CREATED_AT as cd_CREATED_AT, cd.UPDATED_AT as cd_UPDATED_AT, 
                c.id as c_id, c.code as c_code, c.code_desc as c_code_desc, c.coupon_code as c_coupon_code,
                c.status as c_status, c.CREATED_AT as c_CREATED_AT, c.UPDATED_AT as c_UPDATED_AT ,
                bt.id as bt_id, bt.btshop_article_title as bt_btshop_article_title 
                FROM coupon_details cd 
                LEFT JOIN coupon c ON c.id=cd.couponcode_id 
                LEFT JOIN btshop_article bt ON bt.id=cd.product_id ";
        
        ### ALL WHERE
	$Where="";
        
        if($couponstatus!='all') {
                $couponstatus = "'".$couponstatus."'";
		$Where.=' cd.status = '.$couponstatus;
        }else{
                $Where.=' cd.status = "Inprocess" OR cd.status = "Completed" OR cd.status = "Done"';
        }
        
        if($couponcode!='all') {
		$Where.=' AND c.id = '.$couponcode;
	}
	$FinalWhere="";
	
	if($Where!=""){
            $FinalWhere= " WHERE ".$Where;
	}
        
        $OrderBy="";	
	if($request->getParameter('sort')=='yes') {	
		$this->sortOrder	= $request->getParameter('order');
		$this->sortBy		= $request->getParameter('sortby');		
		$this->queryString	.= '&sort=yes&sortby='.$this->sortBy.'&order='.$this->sortOrder;
                
		if($this->sortBy=='product') {		
			$OrderBy.="bt.btshop_article_title $this->sortOrder";
		}else if($this->sortBy=='coupon_code') {		
			$OrderBy.="c.coupon_code $this->sortOrder";
		}else if($this->sortBy=='email') {		
			$OrderBy.="cd.email $this->sortOrder";
		}else if($this->sortBy=='active') {		
			$OrderBy.="cd.IS_INACTIVE $this->sortOrder";
		}else {
                        // Default Order of sorting
			$OrderBy.="cd.CREATED_AT DESC";
		}
	}else {
                        // Default Order of sorting
			$OrderBy.="cd.CREATED_AT DESC";
	}
        
        $this->PageLimit = 50;
        $start = 0;
        if (@$this->Cpage != "") {
            $start = ($this->Cpage - 1) * $this->PageLimit;
        } else {
            $start = 0;
        }

        $QLimit = " LIMIT " . $start . ", " . $this->PageLimit;

        ### FINAL ADDING
        $con = Doctrine_Manager::getInstance()->connection();
        $FinalQuery = $coreQuery .$FinalWhere. " ORDER BY " . $OrderBy . $QLimit;
        
        $this->ResFinal = $con->fetchAll($FinalQuery);
        $QForLimit = $coreQuery .$FinalWhere. " ORDER BY " . $OrderBy;
        $ResForLimit = $con->fetchAll($QForLimit);
        $this->Rtotal = count($ResForLimit);
        $this->NumPage = ceil($this->Rtotal / $this->PageLimit);
        $this->Cpage = $request->getParameter('page', 1);
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            if ($arr['coupon_ids']) {
                foreach ($arr['coupon_ids'] as $key => $value) {
                    $deletedreceipient = Doctrine_Query::create()
                            ->delete()
                            ->from('CouponDetails')
                            ->andWhere('id = '.$value)
                            ->execute();
                }
            }
        }
        if ($request->isXmlHttpRequest()) {
            return $this->renderPartial('borst/send_coupon_list_partial', array(
                        'filterform' => $this->filterform,
                        'ResFinal' => $this->ResFinal,
                        'queryString' => $this->queryString,
                        'sortOrder' => $this->sortOrder,
                        'sortBy' => $this->sortBy,
                        'NumPage' => $this->NumPage,
                        'PageLimit' => $this->PageLimit,
                        'Rtotal' => $this->Rtotal,
                        'Cpage' => $this->Cpage,
                        'sort_message' => $this->sort_message,
                        'moduleurl' => $this->moduleurl
            ));
        }
    }
    /**
     * Executes IsShopImageSet action
     *
     * @param sfRequest $request A request object
     */
    public function executeIsShopImageSet(sfWebRequest $request)
    {
        $product_image = $this->getUser()->getAttribute('product_image', '',
            'userProperty');

        if ($product_image)
            return $this->renderText('');
        else
            return $this->renderText('Image not uploaded');
    }

    /**
     * Executes UploadShopProductImage action
     *
     * @param sfRequest $request A request object
     */
    public function executeUploadShopProductImage(sfWebRequest $request)
    {
        $this->setLayout(false);
        $uploaded_images_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/btshopThumbnail/';

        if ($request->isMethod('post')) {
            if (isset($_FILES['upload_product_image']) && $_FILES['upload_product_image']['size'] !=
                0 && !$_FILES['upload_product_image']['error']) {
                $errors = '';

                $image_info = getimagesize($_FILES['upload_product_image']['tmp_name']);

                if (!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] !=
                    3 && $image_info[2] != 6)
                    $errors = 'Invalid file format';

                if (strlen($errors) == 0) {
                    $nr = 0;
                    switch ($image_info[2]) {
                        case 1:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "product" . $nr . ".gif"))
                                    break;
                            }
                            $filename = "product" . $nr . ".gif";
                            break;

                        case 2:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "product" . $nr . ".jpg"))
                                    break;
                            }
                            $filename = "product" . $nr . ".jpg";
                            break;

                        case 3:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "product" . $nr . ".png"))
                                    break;
                            }
                            $filename = "product" . $nr . ".png";
                            break;

                        case 6:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "product" . $nr . ".bmp"))
                                    break;
                            }
                            $filename = "product" . $nr . ".bmp";
                            break;
                    }
                    $extension_arr = array('gif' => 'image/gif', 'jpg' => 'image/jpeg', 'png' =>
                        'image/png');

                    $file_ext = trim(substr($filename, strpos($filename, '.') + 1, strlen($filename)));

                    // Create the thumbnail
                    $thumbnail = new sfThumbnail(150, 150);
                    $thumbnail->loadFile($_FILES['upload_product_image']['tmp_name']);
                    $thumbnail->save($uploaded_images_path . $filename, $extension_arr[$file_ext]);

                    $errors = 'File Uploaded Successfully,' . $filename;

                    $this->getUser()->setAttribute('product_image', $filename, 'userProperty');
                }
            } else {
                $errors = 'No file provided';
            }
        }
        return $this->renderText($errors);
    }


    /**
     * Executes ShopArticleList action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopArticleList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'btshop_article_list');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();
        $btShopArticleTypes = new BtShopArticleType();

        $query = BtShopArticleTable::getInstance()->getAllBtShopArticleQuery($column_id,
            $order, 'All');
        $this->pager = $mymarket->getPagerForAll('BtShopArticle', 25, $query, $request->
            getParameter('page', 1));

        $this->article_types = $btShopArticleTypes->getAllShopArticleTypes();
    }


    /**
     * Executes GetShopArticleList action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetShopArticleList(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();
        $profile = new SfGuardUserProfile();
        $btShopArticleTypes = new BtShopArticleType();

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('shop_article_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $shop_article_column_order = $request->getParameter('shop_article_column_order');
        $set_column = 'shop_article_column';
        $set_column_order = 'shop_article_column_order';
        $selected_article_type = $request->getParameter('selected_article_type');
        $this->selected_article_type = $selected_article_type;

        $delete_shop_article_id = $request->getParameter('delete_shop_article_id');
        if ($delete_shop_article_id > 0) {
            $btShopArticle = new BtShopArticle();
            $btShopArticle->deletePerticularShopArticle($delete_shop_article_id);

            $btShopPriceDetails = new BtShopPriceDetails();
            $btShopPriceDetails->searchAndDelete($delete_shop_article_id);

            $subscription = new Subscription();
            $subscription->searchAndDeleteSubsciptions($delete_shop_article_id);
        }

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();

            $btShopArticle = new BtShopArticle();
            $btShopArticle->updateShopArticleStatus($arr);
        }

        $order = $profile->setSortingParameters($page, $shop_article_column_order, $column_id,
            $current_column, $set_column, $set_column_order);

        $query = BtShopArticleTable::getInstance()->getAllBtShopArticleQuery($column_id,
            $order, $selected_article_type);

        $this->pager = $mymarket->getPagerForAll('BtShopArticle', 25, $query, $request->
            getParameter('page', 1));

        $this->column_id = $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;
        $this->article_types = $btShopArticleTypes->getAllShopArticleTypes();
        $this->page = $page;

        //$query = BtShopArticleTable::getInstance()->getAllBtShopArticleQuery();
        //$this->pager = $mymarket->getPagerForAll('BtShopArticle',3,$query,$request->getParameter('page', 1));

    }


    /**
     * Executes GetPriceRange action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetPriceRange(sfWebRequest $request)
    {
        $shop_art_id = trim($request->getParameter('shop_art_id'));

        $price_details = new BtShopPriceDetails();
        $this->price_range_data = $price_details->searchShopArticles($shop_art_id);

        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();
        $this->qty_list = $btShopPriceQtyUnit->getAllQtyUnits();
    }

    /**
     * Executes PriceDistribution action
     *
     * @param sfRequest $request A request object
     */
    public function executePriceDistribution(sfWebRequest $request)
    {
        $btShopPriceQtyUnit = new BtShopPriceQtyUnit();
        $this->qty_list = $btShopPriceQtyUnit->getAllQtyUnits();
    }

    /**
     * Executes AdList action
     *
     * @param sfRequest $request A request object
     */
    public function executeAdList(sfWebRequest $request)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/ccount/clicks.txt';
        $this->ccount_link = array();

        $lines = file($file_path);
        foreach ($lines as $thisline) {
            $thisline = trim($thisline);

            list($id, $added, $url, $count, $linkname) = explode('%%', $thisline);
            if ($id != '')
                $this->ccount_link[$id] = $count;
        }

        $this->getUser()->setAttribute('third_menu', 'adlist');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();
        $profile = new SfGuardUserProfile();

        $query = SbtAdsTable::getInstance()->getAllAdsOrderByQuery($column_id, $order);

        $this->pager = $mymarket->getPagerForAll('SbtAds', 25, $query, $request->
            getParameter('page', 1));
    }

    
        
    
    /**
     * Executes AdList action
     *
     * @param sfRequest $request A request object
     */
    public function executeArchiveAdList(sfWebRequest $request)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'] . '/ccount/clicks.txt';
        $this->ccount_link = array();

        $lines = file($file_path);
        foreach ($lines as $thisline) {
            $thisline = trim($thisline);

            list($id, $added, $url, $count, $linkname) = explode('%%', $thisline);
            if ($id != '')
                $this->ccount_link[$id] = $count;
        }

        $this->getUser()->setAttribute('third_menu', 'archiveadlist');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();
        $profile = new SfGuardUserProfile();

        $query = SbtAdsTable::getInstance()->getAllArchiveAdsOrderByQuery($column_id, $order);

        $this->pager = $mymarket->getPagerForAll('SbtAds', 25, $query, $request->
            getParameter('page', 1));
    }
    

    public function executeDeleteAd(sfWebRequest $request)
    {
            $delete_id = $request->getParameter('delete_id');
            
            $deletedreceipient = Doctrine_Query::create()
                ->delete()
                ->from('SbtAds')
                ->andWhere('id = '.$delete_id)
                ->execute();

           
            $this->forward('borst', 'archiveAdList');
    }
    
    /**
     * Executes GetAdList action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetAdList(sfWebRequest $request)
    {
        $mymarket = new mymarket();
        $profile = new SfGuardUserProfile();
        $this->host_str = $this->getRequest()->getHost();

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('adlist_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $adlist_column_order = $request->getParameter('adlist_column_order');
        $set_column = 'adlist_column';
        $set_column_order = 'adlist_column_order';
        $delete_ad_id = $request->getParameter('delete_ad_id');
        $retrive_ad_id = $request->getParameter('retrive_ad_id');
        $isArchive = $request->getParameter('is_unarchive');
        $archive_ad_id = $request->getParameter('archive_ad_id');
        
        if ($delete_ad_id) {
           /* $sbt_ad = new SbtAds();
            $data = $sbt_ad->getPerticularSbtAd($delete_ad_id);
            if ($data) {
                $data->delete();
            }*/
            
            //$data = $sbt_ad->getPerticularSbtAd($delete_ad_id);
            $data = SbtAdsTable::getInstance()->setArchiveAdByQuery($delete_ad_id);
        }
        /* code by sandeep */        
        
        if ($isArchive) {
            
            $data = SbtAdsTable::getInstance()->setOriginalAdByQuery($isArchive);
        }
         /* code by sandeep end */
        
        if ($retrive_ad_id) {
            
            $data = SbtAdsTable::getInstance()->setOriginalAdByQuery($retrive_ad_id);
        }

        $order = $profile->setSortingParameters($page, $adlist_column_order, $column_id,
            $current_column, $set_column, $set_column_order);

        $this->column_id = $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;
        $this->page_number = $page;


        $ad_position = $ad_type = $ad_enable = '';

        if ($request->getParameter('ad_position')) {
            $ad_position = $request->getParameter('ad_position');
        }
        if ($request->getParameter('ad_type')) {
            $ad_type = $request->getParameter('ad_type');
        }
        if ($request->getParameter('ad_enable')) {
            $ad_enable = $request->getParameter('ad_enable');
        }
        if ($request->getParameter('ad_name')) {
            $ad_name = $request->getParameter('ad_name');
        }

        if(!$isArchive) {
        $query = SbtAdsTable::getInstance()->getAllAdsOrderByQuery($column_id, $order, $ad_position,
            $ad_type, $ad_enable,$ad_name);
        }
        else {
         $query = SbtAdsTable::getInstance()->getAllArchiveAdsOrderByQuery($column_id, $order, $ad_position,
            $ad_type, $ad_enable,$ad_name);   
        }

        $this->pager = $mymarket->getPagerForAll('SbtAds', 25, $query, $request->
            getParameter('page', 1));
    }
    /**
     * Executes createAd action
     *
     * @param sfRequest $request A request object
     */
    public function executeCreateAd(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('third_menu', 'adlist');
        $this->host_str = $this->getRequest()->getHost();
        $mymarket = new mymarket();
        $profile = new SfGuardUserProfile();
        $sbt_ads = new SbtAds();
        $pos = array('top_mid' => 'Top Center', 'Right_top1' => 'Right Top 1',
            'Right_top2' => 'Right Top 2', 'Right_top3' => 'Right Top 3', 'Right_top4' =>
            'Right Top 4', 'Header_top1' => 'Header Top 1', 'Header_top2' =>
            'Header Top 2');
        $typ = array('img' => 'Image File', 'swf' => 'Flash file(swf)', 'iframe' =>
            'Iframe', 'script' => 'JavaScript');
        $priority = array('10' => '10%', '20' => '20%', '30' => '30%', '40' => '40%',
            '50' => '50%', '60' => '60%', '70' => '70%', '80' => '80%', '90' => '90%', '100' =>
            '100%');

        if ($request->getParameter('editAd_id')) {
            $this->data = $sbt_ads->getPerticularSbtAd($request->getParameter('editAd_id'));
            $this->form = new SbtAdsForm($this->data);
        } else
            $this->form = new SbtAdsForm();

        $this->wSchema = $this->form->getWidgetSchema();
        $this->wSchema['ad_position']->setOption('choices', $pos);
        $this->wSchema['ad_type']->setOption('choices', $typ);
        //$this->wSchema['priority']->setOption('choices',$priority);

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $form_arr = $request->getParameter($this->form->getName());

            if (isset($arr['co_enabled']) && $arr['co_enabled'] == 'Y')
                $form_arr['is_enabled'] = 'Y';
            else
                $form_arr['is_enabled'] = 'N';

            if (isset($arr['co_target']) && $arr['co_target'] == 'B')
                $form_arr['ad_target'] = 'B';
            else
                $form_arr['ad_target'] = 'N';

            $this->form->bind($form_arr);
            if ($this->form->isValid()) {
                $obj = $this->form->save();
                $url = 'http://' . $this->host_str . '/backend.php/borst/adList';
                $this->redirect($url);
            } else {
                //echo $this->form->getErrorSchema();
            }
        }
    }

    /*
    *
    * This function is used while uploading the ingress image file.
    *
    */
    public function executeBtIngressImageUpload($request)
    {
        $this->setLayout(false);
        $this->host_str = $this->getRequest()->getHost();
        $action_mode = $request->getParameter('mode') ? $request->getParameter('mode') :
            'upload';
        $this->p = $request->getParameter('p');
        $uploaded_images_path = $_SERVER['DOCUMENT_ROOT'] .
            '/uploads/articleIngressImages/';
        $images_per_page = 10;

        if ($request->isMethod('post')) {
            if (isset($_FILES['probe']) && $_FILES['probe']['size'] != 0 && !$_FILES['probe']['error']) {
                $errors = '';

                $image_info = getimagesize($_FILES['probe']['tmp_name']);

                if (!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] != 3 && $image_info[2] != 6)
                    $errors = 'Invalid file format';

                if (strlen($errors) == 0) {
                    $nr = 0;
                    switch ($image_info[2]) {
                        case 1:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_ingress" . $nr . "_large.gif"))
                                    break;
                            }
                            $filename = "art_ingress" . $nr . "_large.gif";
                            break;

                        case 2:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_ingress" . $nr . "_large.jpg"))
                                    break;
                            }
                            $filename = "art_ingress" . $nr . "_large.jpg";
                            break;

                        case 3:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_ingress" . $nr . "_large.png"))
                                    break;
                            }
                            $filename = "art_ingress" . $nr . "_large.png";
                            break;

                        case 6:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_ingress" . $nr . "_large.bmp"))
                                    break;
                            }
                            $filename = "art_ingress" . $nr . "_large.bmp";
                            break;
                    }
                    $extension_arr = array('gif' => 'image/gif', 'jpg' => 'image/jpeg', 'png' =>
                        'image/png');
                    //$width_arr = array(407, 198, 239, 238);
                    //$height_arr = array(auto, 148, 187, 143);
                    $width_arr = array(465, 223, 300, 165);
                    $height_arr = array(465, 223, 300, 165);
                    $img_name_arr = array('_large', '_semimid', '_mid', '_small');

                    $file_ext = trim(substr($filename, strpos($filename, '.') + 1, strlen($filename)));

                    for ($i = 0; $i < 4; $i++) {
                        //echo str_replace('_large',$img_name_arr[$i],$filename).'<br>';
                        // Create the thumbnail
                        $thumbnail = new sfThumbnail($width_arr[$i], $height_arr[$i]);
                        $thumbnail->loadFile($_FILES['probe']['tmp_name']);
                        $thumbnail->save($uploaded_images_path . str_replace('_large', $img_name_arr[$i],$filename), $extension_arr[$i]);
                    }
                    $errors = 'File Uploaded Successfully';
                }
            } else {
                $errors = 'No file provided';
            }
        }

        if ($request->getParameter('uploaded_image_selected')) {
            $action_mode = 'uploaded';
            $this->filename = $request->getParameter('uploaded_image_selected');
        } else
            $this->filename = str_replace('_large', '', $filename);

        $this->action_mode = $action_mode;
        $this->uploaded_images_path = $uploaded_images_path;
        $this->images_per_page = $images_per_page;
        $this->image_manipulated = $image_manipulated;
        $this->errors = $errors;
    }

    /*
    *
    * This function is used while uploading the detail image file.
    *
    */
    public function executeBtDetailImageUpload($request)
    {
        $this->setLayout(false);
        $this->host_str = $this->getRequest()->getHost();
        $action_mode = $this->getRequestParameter('mode') ? $this->getRequestParameter('mode') :
            'upload';
        $this->p = $this->getRequestParameter('p');
        $upload_max_img_size = 200; //150;
        $upload_max_img_width = 600; //495;
        $upload_max_img_height = 800; //1000;
        $uploaded_images_path = $_SERVER['DOCUMENT_ROOT'] .
            '/uploads/articleDetailImages/';
        $images_per_page = 10;

        if ($request->isMethod('post')) {
            /*$upload_exp = '<b>Note:</b> Endast JPG-, GIF- och PNG-bilder kan laddas upp. Maximal storlek för en bild är [width] x [height] px and [size] KB. Större bilder kommer, om möjligt, att skalas ned.';
            $upload_exp = str_replace("[width]", $upload_max_img_width, $upload_exp);
            $upload_exp = str_replace("[height]", $upload_max_img_height, $upload_exp);
            $upload_exp = str_replace("[size]", $upload_max_img_size, $upload_exp);*/

            if (isset($_FILES['probe']) && $_FILES['probe']['size'] != 0 && !$_FILES['probe']['error']) {
                $errors = '';
                $image_info = getimagesize($_FILES['probe']['tmp_name']);
                
                if (!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] !=
                    3 && $image_info[2] != 6)
                    $errors = 'invalid file format';

                if (strlen($errors) == 0) {
                    if ($_FILES['probe']['size'] > $upload_max_img_size * 1000 || $image_info[0] > $upload_max_img_width ||
                        $image_info[1] > $upload_max_img_height) {

                        $compression = 10;
                        $width = $image_info[0];
                        $height = $image_info[1];

                        if ($width >= $height) {
                            $new_width = $upload_max_img_width;
                            $new_height = intval($height * $new_width / $width);
                        } else {
                            $new_height = $upload_max_img_height;
                            $new_width = intval($width * $new_height / $height);
                        }

                        $img_tmp_name = uniqid(rand()) . '.tmp';
                        for ($compression = 100; $compression > 9; $compression = $compression - 10) {
                            if (!stdlib::resize($_FILES['probe']['tmp_name'], $uploaded_images_path . $img_tmp_name,
                                $new_width, $new_height, $compression)) {
                                $file_size = @filesize($uploaded_images_path . $img_tmp_name);
                                break;
                            }
                            $file_size = @filesize($uploaded_images_path . $img_tmp_name);

                            if ($image_info[2] != 2 && $file_size > $upload_max_img_size * 1000)
                                break;
                            if ($file_size <= $upload_max_img_size * 1000)                           
                                break;
                        }

                        if ($file_size > $upload_max_img_size * 1000) {
                            $file_too_large_dump = str_replace("[width]", $image_info[0],
                                'file too large ([width]*[height], [size] KB)');
                            $file_too_large_dump = str_replace("[height]", $image_info[1], $file_too_large_dump);
                            $file_too_large_dump = str_replace("[size]", number_format($_FILES['probe']['size'] /
                                1000, 0, ",", ""), $file_too_large_dump);
                            $errors = $file_too_large_dump;
                        }

                        if (strlen($errors) == 0) {
                            if (file_exists($uploaded_images_path . $img_tmp_name)) {
                                @chmod($uploaded_images_path . $img_tmp_name, 0777);
                                @unlink($uploaded_images_path . $img_tmp_name);
                            }
                        }
                    }
                }

                if (strlen($errors) == 0) {
                    $nr = 0;
                    switch ($image_info[2]) {
                        case 1:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_detail" . $nr . ".gif"))
                                    break;
                            }
                            $filename = "art_detail" . $nr . ".gif";
                            break;

                        case 2:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_detail" . $nr . ".jpg"))
                                    break;
                            }
                            $filename = "art_detail" . $nr . ".jpg";
                            break;

                        case 3:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_detail" . $nr . ".png"))
                                    break;
                            }
                            $filename = "art_detail" . $nr . ".png";
                            break;

                        case 6:
                            for (;; ) {
                                $nr++;
                                if (!file_exists($uploaded_images_path . "art_detail" . $nr . ".bmp"))
                                    break;
                            }
                            $filename = "art_detail" . $nr . ".bmp";
                            break;
                    }

                    if (isset($img_tmp_name)) {
                    
                        if($new_width <= $upload_max_img_width && $new_height <= $upload_max_img_height && $file_size <= ($upload_max_img_size * 1000)){
                            $thumbnail = new sfThumbnail($new_width, $new_height);
                            $thumbnail->loadFile($_FILES['probe']['tmp_name']);
                            $thumbnail->save($uploaded_images_path . $filename);
                        }else{
                            @rename($uploaded_images_path . $img_tmp_name, $uploaded_images_path . $filename) or
                                $errors = 'Error while uploading the image';
                            $image_manipulated = str_replace('[width]', $new_width,
                                '3The upload was successful but the image had to be downsized. New size is [width] x [height] px, [size] KB.');
                            $image_manipulated = str_replace('[height]', $new_height, $image_manipulated);
                            $image_manipulated = str_replace("[size]", number_format($file_size / 1000, 0,
                                ",", ""), $image_manipulated);
                        }                        
                    } else {
                        move_uploaded_file($_FILES['probe']['tmp_name'], $uploaded_images_path . $filename) or
                            $errors = 'Error while uploading the image';
                    }
                }

                if (strlen($errors) == 0) {
                    @chmod($uploaded_images_path . $filename, 0644);
                    $action_mode = 'uploaded';
                } else
                    $action_mode = 'upload';
            } else {
                $errors = 'File not provided';
            }

            if (strlen($errors) == 0) {
                if (isset($_FILES['probe']['error']))
                    $errors = str_replace('[maximum_file_size]', ini_get('upload_max_filesize'),
                        'Error while uploading the image. The image might be larger than the maximum accepted file size of the server ([maximum_file_size]).');
            }
        }

        if ($this->getRequestParameter('uploaded_image_selected')) {
            $action_mode = 'uploaded';
            $this->filename = $this->getRequestParameter('uploaded_image_selected');
        } else
            $this->filename = $filename;

        $this->action_mode = $action_mode;
        $this->uploaded_images_path = $uploaded_images_path;
        $this->images_per_page = $images_per_page;
        $this->image_manipulated = $image_manipulated;
        $this->errors = $errors;
    }
    /*
    *
    * This function is used for test Subscription.
    *
    */
    public function executeTestEmail(sfWebRequest $request){
            $purchase = new Purchase();
            $product = new BtShopArticle();
            $subscription = new Subscription();
            $query_new = Doctrine_Query::create()->from('Subscription s')->limit(10)->execute();        
            $currentDate = date('Y-m-d');
            
            foreach($query_new as $data){

                $end_date = $data->getDateTimeObject('end_date')->format('Y-m-d');
                $date1 = strtotime($currentDate);
                $date2 = strtotime($end_date);
                $seven_days_before_date = date('Y-m-d', strtotime('-7 days', strtotime($end_date)));
                $dateDiff = $date2 - $date1;
                $Days = floor($dateDiff/(60*60*24));

                if($currentDate == $seven_days_before_date)
                {
                        $pur = $purchase->getPurchaseOrder($data->purchase_id);
                        $product_arr = $product->getProductName($data->product_id, $data->btchart_type_id);
                        $subName= $product_arr[0]['title'];
                        //$subscription_reminder	= new SubscriptionReminder();                                                
                        //$subscription_reminder->sendSubEmail($pur->firstname, $pur->lastname, $subName, $data->end_date);
                        $mailBody = $this->getPartial('subscription_remider',array('firstname'=>$pur->firstname,'lastname'=>$pur->lastname,'subName'=>$subName, 'endDate' => $data->end_date));                    
                        $to = 'sandeepdudhal22@gmail.com';//$pur->email;
                        $from = sfConfig::get('app_mail_sender_email'); 
                        $message = $this->getMailer()->compose();
                        $message->setSubject('Börstjänaren Kontoinformation');
                        $message->setTo($to);
                        $message->setFrom($from);
                        $message->setBody($mailBody, 'text/html');
                        //$this->getMailer()->send($message);

                        echo "<pre>"; print_r($mailBody);
                        //echo "<pre>how";  print_r($data->end_date.'=='.$Days.'=='.$seven_days_before_date.'=='.$currentDate.'=='.$to.'=='.$from.'=='.$product_arr[0]['title'].'=='.$pur->firstname.'=='.$pur->lastname.'=='.$pur->email.'=='.'=='.$Days);
                }
            }
    }
    /*
    *
    * This function is used for listing Subscription.
    *
    */
    public function executeSubscriptionList(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'subscription');
        $this->host_str = $this->getRequest()->getHost();
        $coupon = new Coupon();
        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();
        $this->purchasedItem = new PurchasedItem();
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
                /*if($_GET['code']){
                        if ($arr['subscriber_check']) {
                            foreach ($arr['subscriber_check'] as $key => $value) {
                                $product_name = $arr['product_name'][$value];
                                $subscriber_name = $arr['subscriber_name'][$value];
                                $subscriber_email = $arr['subscriber_email'][$value];
                                $subscriber_userid = $arr['subscriber_userid'][$value];
                                $article_id = $arr['article_id'][$value];
                                $coupon_code = $arr['coupon_code'];

                                $query = Doctrine_Query::create()->from('CouponDetails ss')
                                        ->where('ss.product_id = ? AND ss.user_id = ? AND ss.couponcode_id = ? AND ss.status = ?', array($article_id, $subscriber_userid, $coupon_code, 'Pending'));
                                $data = $query->fetchOne();
                                if($data){
                                    echo "already exist";
                                }else{
                                    $couponDetails = new CouponDetails();
                                    $couponDetails->product_id = $article_id;
                                    $couponDetails->user_id = $subscriber_userid;
                                    $couponDetails->couponcode_id = $coupon_code;
                                    $couponDetails->status = 'Pending';
                                    $couponDetails->save();
                                    
                                    $body = "Hi $subscriber_name, /n";
                                    $body .= " We are giving discount coupon code $coupon_code for your subscription $product_name /n";
                                    $body .= " Please renew it using this coupon code /n";
                                    $body .= " Thanks /n";
                                    $to = $subscriber_email;
                                    $from = sfConfig::get('app_mail_shop_email');

                                    $message = $this->getMailer()->compose();
                                    $message->setSubject('subscription coupon code');
                                    $message->setTo($to);
                                    $message->setFrom($from);
                                    $message->setBody($body, 'text/html');
                                    $this->getMailer()->send($message);
                                }                                
                            }
                    }
                }*/
            $subscription->updatePurchase($arr);
        }

        $query = $subscription->getAllSubscriptionQueryAbonnmang();
        $mymarket = new mymarket();

        $this->pager = $mymarket->getPagerForAll('Subscription', 50, $query, $request->
            getParameter('page', 1));

        $this->subscription_types = $this->product->getAllShopArticleTitleFromSubscription();
        $this->couponCode = $coupon->getAllCouponCode();

    }

    /*
    *
    * This function is used for listing Subscription list.
    *
    */
    public function executeGetSubscriptionListData(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
         $this->purchasedItem = new PurchasedItem();
        $subscription = new Subscription();
        $profile = new SfGuardUserProfile();
        $coupon = new Coupon();

        $action_type = $request->getParameter('action_type');
        if ($request->getParameter('subscription_type') != 'All') {
            $selected_subscription_type = $request->getParameter('subscription_type');
        } else {
            $selected_subscription_type = 'All';
        }
        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        if ($request->getParameter('page') > 0) {
            $page = $request->getParameter('page');
        } else {
            $page = 1;
        }
        if ($request->getParameter('ordertype')!='') {
            $order = $request->getParameter('ordertype');
        } else {
            $order = 'DESC';
        }
        $selected_coupon_code = $request->getParameter('coupon_code');
       
        $subscription_list_column_order =$order;
        $current_column = $this->getUser()->getAttribute('subscription_list_column','','userProperty');
        $set_column = 'subscription_list_column';
        $set_column_order = 'subscription_list_column_order';
        $order1 = $profile->setSortingParameters($page, $subscription_list_column_order,
        $column_id, $current_column, $set_column, $set_column_order);
        //echo $order1;//die; 
        // passing parameters for searching
        $search_by['firstname'] = trim($request->getParameter('first_name_txt'));
        $search_by['lastname'] = trim($request->getParameter('last_name_txt'));
        $search_by['orderno'] = trim($request->getParameter('order_number_txt'));
       // print_r($search_by);//die;
        $query = $subscription->getSubscriptionOfUserQueryAbonmang($column_id, $order, $selected_subscription_type,
            $search_by, $action_type);

        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Subscription', 50, $query, $page);

        $this->selected_subscription_type = $selected_subscription_type;
        $this->column_id = $column_id;
        $this->current_column_order = $order=='ASC'?'DESC':'ASC';
        $this->cur_column = $current_column;
        $this->page = $page;
        $this->subscription_types = $this->product->getAllShopArticleTitleFromSubscription();
        $this->couponCode = $coupon->getAllCouponCode();
        $this->selected_coupon_code = $selected_coupon_code;
    }

    /*
    *
    * This function is used for sendSubscription.
    *
    */
    public function executeSendSubscription(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'subscription');
        $this->host_str = $this->getRequest()->getHost();

        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();
        $query = $subscription->getAllSubscriptionQuery();

        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Subscription', 10, $query, $request->
            getParameter('page', 1));
    }

    /*
    *
    * This function is used for GetSubscriptionList.
    *
    */
    public function executeGetSubscriptionList(sfWebRequest $request)
    {
        $type_id = $request->getParameter('type_id');
        $btShopArticle = new BtShopArticle();
        $this->data = $btShopArticle->getShopArticleOfType($type_id);
    }

    /*
    *
    * This function is used for filteredSubscriberList.
    *
    */
    public function executeFilteredSubscriberList(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'subscription');
        
        $btShopArticle = new BtShopArticle();
        $this->data = $btShopArticle->getShopArticleOfTypePublic(6);
    }

    /*
    *
    * This function return email of user which who have perchased specific subscribtion.
    *
    */
    public function executeEmailOfValidSubscriber(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $subscription = new Subscription();

        if ($request->isMethod('post')) {
            $this->arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->emails = $subscription->getEmailOfValidPurchaseIdOnDate($this->arr, 'list');
        }

    }

    /*
    *
    * This function is used for GetSubscriptionList.
    *
    */
    public function executeGetFilterSubscriptionList(sfWebRequest $request)
    {
        $type_id = $request->getParameter('type_id');
        $btShopArticle = new BtShopArticle();
        $this->data = $btShopArticle->getShopArticleOfTypePublic($type_id);
    }

    /*
    *
    * This function adds new Newsletter.
    *
    */
    public function executeCreateNewsletter(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        $btNewsletterType = new BtNewsletterType();

        $arr = $this->getRequest()->getParameterHolder()->getAll();

        // For editing a specific newsletter name
        if ($arr['edit_newsletter_id']) {
            if ($arr['edit_newsletter_id']) {
                $one_newsletter = $btNewsletterType->getSelectedNewsletterType($arr['edit_newsletter_id']);
                if ($one_newsletter) {
                    $one_newsletter->newsletter_name = $arr['newsletter_name'];
                    $one_newsletter->save();
                }
            }
        }

        // For adding new newsletter.
        if ($arr['add_newsletter_text']) {
            if ($arr['add_newsletter_text']) {
                $btNewsletterType->addNewNewsletter($arr['add_newsletter_text']);
            }
        }

        $this->all_type = $btNewsletterType->getAllNewsletterType();

    }

    /**
     * Executes CheckForNewsletter action
     *
     * @param sfRequest $request A request object
     */
    public function executeCheckForNewsletter(sfWebRequest $request)
    {
        $newsletter_name = $this->getRequestParameter('newsletter_name');

        $btNewsletterType = new BtNewsletterType();
        if ($newsletter_name)
            $return_data = $btNewsletterType->isNewsletterPresent($newsletter_name);

        return $this->renderText($return_data);
    }

    /**
     * Executes SearchNewsletterSubscriber action
     *
     * @param sfRequest $request A request object
     */
    public function executeSearchNewsletterSubscriber(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_newsletter_form');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        $this->status_arr = array();

        $btNewsletterType = new BtNewsletterType();
        $this->all_type = $btNewsletterType->getAllNewsletterType();

        $btNewsletterSubscriber = new BtNewsletterSubscriber();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $this->emails = $btNewsletterSubscriber->searchForSpecifiedSubscriber($arr);

            $temp_arr = $arr['news'];
            foreach ($this->all_type as $data) {
                if (in_array($data->id, $temp_arr))
                    $this->status_arr[$data->id] = 1;
            }
        }
    }

    /**
     * Executes Btchart action
     *
     * @param sfRequest $request A request object
     */
    public function executeBtchart(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('third_menu', 'btchart');
        $this->host_str = $this->getRequest()->getHost();
        $companyList = new BtchartCompanyDetails();

        $companyList = new BtchartCompanyDetails();
        if ($request->isMethod('get')) {
            if ($request->hasParameter('stock_type')) {
                $stock_type = ($request->getParameter('stock_type') == 'all') ? null : $request->
                    getParameter('stock_type');
                $this->getUser()->setAttribute('stock_type', $stock_type);
            }
        }
        if ($this->getUser()->hasAttribute('stock_type')) {
            $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type');
            $query = $companyList->getStockList2($stock_type);
            $this->selected_stock_type = $stock_type;
        } else
            $query = $companyList->getStockList2();

        $stock_types = BtchartCompanyCategory::getCompanyCategory();
        $this->stock_types = $stock_types;

        $this->catgeory_arr = BtchartCompanyCategory::getCompanyCategory();
        //code change by sandeep
        $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
        foreach ($object_data as $obj) {
                    $object_arr[$obj->object_id] = $obj->object_name;
        }
        $this->object_arr = $object_arr;
        //code change by sandeep end
        
        $this->pager = new sfDoctrinePager('BtchartCompanyDetails', 20);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }
    /**
     * Executes Btchart action
     *
     * @param sfRequest $request A request object
     */
    public function executeGetBtChartListData(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $profile = new SfGuardUserProfile();

        $column_id = trim(str_replace('sortby_', '', $request->getParameter('column_id')));
        $current_column = $this->getUser()->getAttribute('btchart_column', '',
            'userProperty');
        $page = $request->getParameter('page');
        $btchart_column_order = $request->getParameter('btchart_column_order');
        $set_column = 'btchart_column';
        $set_column_order = 'btchart_column_order';

        $order = $profile->setSortingParameters($page, $btchart_column_order, $column_id,
            $current_column, $set_column, $set_column_order);

        $this->column_id = 'sortby_' . $column_id;
        $this->current_column_order = $order;
        $this->cur_column = $current_column;

        $companyList = new BtchartCompanyDetails();

        $companyList = new BtchartCompanyDetails();
        if ($request->isMethod('get')) {
            if ($request->hasParameter('stock_type')) {
                $stock_type = ($request->getParameter('stock_type') == 'all') ? null : $request->
                    getParameter('stock_type');
                $this->getUser()->setAttribute('stock_type', $stock_type);
            }
        }
        if ($this->getUser()->hasAttribute('stock_type') || $order) {
            $stock_type = sfContext::getInstance()->getUser()->getAttribute('stock_type');
            $query = $companyList->getStockListQuery($column_id, $order, $stock_type);
            $this->selected_stock_type = $stock_type;
        } else
            $query = $companyList->getStockList2();

        $stock_types = BtchartCompanyCategory::getCompanyCategory();
        $this->stock_types = $stock_types;

        $this->catgeory_arr = BtchartCompanyCategory::getCompanyCategory();
        //code change by sandeep
        $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
        foreach ($object_data as $obj) {
                    $object_arr[$obj->object_id] = $obj->object_name;
        }
        $this->object_arr = $object_arr;
        //code change by sandeep end
        
        $this->pager = new sfDoctrinePager('BtchartCompanyDetails', 20);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeAddStock(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('third_menu', 'btchart');
        $this->host_str = $this->getRequest()->getHost();
                 //code change by sandeep
            $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
            foreach ($object_data as $obj) {
                $object_arr[$obj->object_id] = $obj->object_name;
            }
            //code change by sandeep end
        $companyForm = new BtchartCompanyDetailsForm();
        $catgeory_arr = BtchartCompanyCategory::getCompanyCategory();

        $this->form = $companyForm;
        $this->wSchema = $this->form->getWidgetSchema();
        $this->wSchema['company_type_id']->setOption('choices', $catgeory_arr);
        $this->wSchema['object_id']->setOption('choices', $object_arr);//code change by sandeep
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();

            $form_data = $request->getParameter($this->form->getName());
            $form_data['created_at'] = date('Y-m-d H:i:s');
            $this->form->bind($form_data);

            if ($this->form->isValid()) {
                $this->form->save();
                $this->addSuccess = 1;
                $this->redirect('borst/btchart');
            } else {
                //echo $this->form->getErrorSchema();
            }
        }
    }
    public function executeEditStock(sfWebRequest $request)
    {
        $stock_id = $request->getParameter('stock_id');
        $this->stock_id = $stock_id;
        $obj = new BtchartCompanyDetails();
        $form_data = $obj->getSelectedStockRecordBackend($stock_id);
        $this->form_data = $form_data;

        $this->getUser()->setAttribute('third_menu', 'btchart');
        $this->host_str = $this->getRequest()->getHost();

            //code change by sandeep
            $object_data = ObjektTable::getInstance()->getAllBorstArticleObjects();
            foreach ($object_data as $obj) {
                $object_arr[$obj->object_id] = $obj->object_name;
            }
            //code change by sandeep end
        $companyForm = new BtchartCompanyDetailsForm($form_data);
        $catgeory_arr = BtchartCompanyCategory::getCompanyCategory();

        $this->form = $companyForm;
        $this->wSchema = $this->form->getWidgetSchema();
        $this->wSchema['company_type_id']->setOption('choices', $catgeory_arr);
            $this->wSchema['object_id']->setOption('choices', $object_arr);//code change by sandeep
        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();

            $form_data = $request->getParameter($this->form->getName());
            $form_data['created_at'] = $arr['created_at'];
            $form_data['active'] = $arr['active'];
            $form_data['updated_at'] = date('Y-m-d H:i:s');
            $this->form->bind($form_data);

            if ($this->form->isValid()) {
                $this->form->save();
                $this->updateSuccess = 1;
                $this->redirect('borst/btchart');
            } else {
                //echo $this->form->getErrorSchema();
            }
        }
    }
    public function executeDeleteStock(sfWebRequest $request)
    {
        $stock_id = $request->getParameter('stock_id');
        $obj = new BtchartCompanyDetails();
        $success = $obj->deleteStockRecord($stock_id);

        return sfView::NONE;
    }
    public function executeUploadChart(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('third_menu', 'btchart');
        $this->host_str = $this->getRequest()->getHost();

        $stock = new BtchartCompanyDetails();
        $list = $stock->getStockListIdAndName();
        $stock_list = array();
        foreach ($list as $data) {
            $stock_list[$data->id] = $data->company_name;
        }
        $this->stock_list = $stock_list;

        $chart_obj = new BtchartType();
        $this->chart_list = $chart_obj->getChartTypes();
    }
    public function executeUploadChartImage(sfWebRequest $request)
    {
        $this->setLayout(false);
        $uploaded_images_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/btcharts_dummy/';

        if ($request->isMethod('post')) {
            if (isset($_FILES['upload_product_image']) && $_FILES['upload_product_image']['size'] !=
                0 && !$_FILES['upload_product_image']['error']) {
                $errors = '';

                $image_info = getimagesize($_FILES['upload_product_image']['tmp_name']);

                if (!is_array($image_info) || $image_info[2] != 1 && $image_info[2] != 2 && $image_info[2] !=
                    3 && $image_info[2] != 6)
                    $errors = 'Invalid file format';

                if (strlen($errors) == 0) {
                    $stock_id = $request->getParameter('company_id');
                    $chart_type = $request->getParameter('chart_type_id');

                    $stock_obj = new BtchartCompanyDetails();
                    $chart_obj = new BtchartType();
                    $stock_symbol = $stock_obj->getStockSymbol($stock_id);
                    $chart_file_name = $chart_obj->getChartFileName($chart_type);

                    $filename = $stock_symbol . "_" . $chart_file_name;

                    $thumbnail = new sfThumbnail();
                    $thumbnail->loadFile($_FILES['upload_product_image']['tmp_name']);
                    $thumbnail->save($uploaded_images_path . $filename);
                    //$errors = 'File Uploaded Successfully';
                    $errors = 'File Uploaded Successfully (' . $filename . ')';
                }
            } else {
                $errors = 'No file provided';
            }
        }
        return $this->renderText($errors);
    }

    public function executeAddChartType(sfWebRequest $request)
    {
        $this->getUser()->setAttribute('third_menu', 'btchart');
        $this->host_str = $this->getRequest()->getHost();

        $chart_form = new BtchartTypeForm();
        $this->form = $chart_form;
        $this->wSchema = $this->form->getWidgetSchema();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();

            $form_data = $request->getParameter($this->form->getName());
            $form_data['created_at'] = date('Y-m-d H:i:s');
            $form_data['chart_type_category'] = 'paid';
            $this->form->bind($form_data);

            if ($this->form->isValid()) {
                $this->form->save();
                $this->addSuccess = 1;
            } else {
                //echo $this->form->getErrorSchema();
            }
        }
    }

    /**
     * Returns the Chart Types
     *
     * @param sfRequest $request A request object
     */
    public function executeGetChartTypes(sfWebRequest $request)
    {
        $chart_obt = new BtchartType();
        $chart_types = $chart_obt->getPaidChartTypes(true);
        $this->chart_types = $chart_types;
    }
    public function executeEnableOrDisableStocks(sfWebRequest $request)
    {
        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $stock_obj = new BtchartCompanyDetails();
        $stock_obj->setEnableAndDisable($arr['stock']);
        return $this->renderText("Changes Saved");
    }

    /**
     * Executes ShopTransactionList action
     *
     * @param sfRequest $request A request object
     */
    public function executeShopTransactionList(sfWebRequest $request)
    {
        //echo "<pre>";  print_r($request); die;
        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', 'borst_menu_transaction_list');
        $this->getUser()->setAttribute('third_menu', '');
        $this->host_str = $this->getRequest()->getHost();

        $this->purchasedItem = new PurchasedItem();
        $this->product_article = new BtShopArticle();

        $this->rec_per_page = 25;

        $query = PurchaseTable::getInstance()->getAllPurchaseRecords(1, 2);
        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Purchase', $this->rec_per_page, $query,
            $request->getParameter('page', 1));
    }

    /**
     * Executes ViewPurchaseDetail action
     *
     * @param sfRequest $request A request object
     */
    public function executeViewPurchaseDetail(sfWebRequest $request)
    {
        $this->host_str = $this->getRequest()->getHost();
        $purchasedItem = new PurchasedItem();
        $this->product_article = new BtShopArticle();
        $this->article = new Article();
        $purchase = new Purchase();
        $this->profile = new SfGuardUserProfile();
        $this->subscription = new Subscription();

        $id = $request->getParameter('id');
        if ($id) {
            $this->item_list = $purchasedItem->fecthPurchasedItemList($id);
            $this->purchase_id = $id;
            $this->purchase_data = $purchase->getPurchaseOrder($id);
            $this->purchase_rec = $purchase->getPurchaseOrder($id);
        }
    }

    /**
     * Executes ChangePurchaseOrderStatus
     *
     * @param sfRequest $request A request object
     */
    public function executeChangePurchaseOrderStatus(sfWebRequest $request)
    {
        $id = $request->getParameter('pur_id');
        if ($id) {
            $purchase = new Purchase();
            $purchase_data = $purchase->getPurchaseOrder($id);
            $purchase_data->checkout_status = 1;
            $purchase_data->save();

            $this->rec = $purchase_data;
        }
    }

    /**
     * Executes SearchPurchaseOrder
     *
     * @param sfRequest $request A request object
     */
    public function executeSearchPurchaseOrder(sfWebRequest $request)
    {
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        $this->host_str = $this->getRequest()->getHost();
        $this->purchasedItem = new PurchasedItem();
        $this->product_article = new BtShopArticle();

        $this->rec_per_page = 25;

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();

             //echo 'hi';die;
            if ($arr['action_mode'] == 'purchase_update') {
                if ($arr['purchase_ids']) {
                    foreach ($arr['purchase_ids'] as $key => $value)
                    {
                        $purchase = new Purchase();
                        $record = $purchase->getPurchaseOrder($value);
                        $first_flag = $record->order_processed;

                        $old_date = substr($record->payment_date, 0, 10);
                        $new_date = substr($arr["payment_date"][$key], 0, 10);

                        if ($old_date != $new_date)
                        {
                            $status = 1;
                        } 
                        else
                        {
                            $status = $arr["payment_status"][$key];
                        }

                        $info_arr = $this->purchasedItem->getOnePurchasedItem($value);

                        if ($info_arr['shipping'] == 0 && $status == 1)
                        {
                            $order_process_status = 1;
                        } 
                        else
                        {
                            $order_process_status = $arr["order_process_status"][$key];
                        }

                        $payment_date = ($arr["payment_status"][$key] == 1 && $record->checkout_status !=
                            1) ? date('Y-m-d') : $arr["payment_date"][$key];

                        $record->setSelectedPurchaseOrder($payment_date == '' ? null : $payment_date, $status,
                            $order_process_status);


                        if ($first_flag == 0 && $arr["order_process_status"][$key] == 1)
                        {
                            $pur_id = $request->getParameter('pur_id');
                        }
                        
                    }
                }
            }

            // echo ("<pre>");
            // print_r($arr);
            // die;


            //$query = PurchaseTable::getInstance()->getAllPurchaseRecords($arr['purchase_order'],$arr['purchase_sort_order']);
            $query = PurchaseTable::getInstance()->getAllPurchaseRecordsByOrders($arr['purchase_order'],
                $arr['purchase_sort_order'], $arr['purchase_status'], $arr['order_processed_status'],
                $arr['article_type'], $arr['order_number_txt'], $arr['first_name_txt'], $arr['last_name_txt']);
            $mymarket = new mymarket();
            $this->pager = $mymarket->getPagerForAll('Purchase', $this->rec_per_page, $query,
                $request->getParameter('page', 1));
        }
    }

    /**
     * Executes SearchPurchaseOrder
     *
     * @param sfRequest $request A request object
     */
    public function executeSearchSubscriptionList(sfWebRequest $request)
    {

        $this->host_str = $this->getRequest()->getHost();

        $this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        $this->getUser()->setAttribute('submenu_menu', '');
        $this->getUser()->setAttribute('third_menu', 'subscription');
        $this->host_str = $this->getRequest()->getHost();

        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $subscription->updatePurchase($arr);
               
        }
        //$query = $subscription->getAllSubscriptionQuery();
        $query = $subscription->getAllSubscribersByOrders($arr['order_number_txt'], $arr['first_name_txt'],
            $arr['last_name_txt']);
        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Subscription', 50, $query, $request->
            getParameter('page', 1));

        $this->subscription_types = $this->product->getAllShopArticleTitle();
        return $this->renderPartial('borst/subscription_list_partial', array('pager' =>
            $this->pager, 'purchase' => $this->purchase, 'product' => $this->product,
            'subscription_types' => $this->subscription_types));


        

                                
                   

        /*
        $this->host_str = $this->getRequest()->getHost();	
        $this->purchasedItem = new PurchasedItem();
        $this->product_article = new BtShopArticle();
        
        $this->rec_per_page = 25;
        
        if ($request->isMethod('post'))
        {  
        $arr = $this->getRequest()->getParameterHolder()->getAll();
        
        
        if($arr['action_mode'] == 'purchase_update')
        {
        if($arr['purchase_ids'])
        {
        foreach ($arr['purchase_ids'] as $key => $value) 
        {
        $purchase = new Purchase();
        $record = $purchase->getPurchaseOrder($value);
        $first_flag = $record->order_processed;
        
        $old_date = substr($record->payment_date,0,10);
        $new_date = substr($arr["payment_date"][$key],0,10);
        
        if($old_date != $new_date) { $status = 1; }
        else { $status = $arr["payment_status"][$key]; }
        
        $info_arr = $this->purchasedItem->getOnePurchasedItem($value);
        
        if($info_arr['shipping'] == 0 && $status == 1){ $order_process_status = 1;}
        else{ $order_process_status = $arr["order_process_status"][$key]; }
        
        $payment_date = ($arr["payment_status"][$key] == 1 && $record->checkout_status != 1) ? date('Y-m-d') : $arr["payment_date"][$key];
        
        $record->setSelectedPurchaseOrder($payment_date == '' ? NULL : $payment_date,$status,$order_process_status);
        
        
        if($first_flag == 0 && $arr["order_process_status"][$key] == 1)
        {
        $pur_id = $request->getParameter('pur_id');

        if($record)
        {
        
        $mailBody = $this->getPartial('processed_order_mail',array('user'=>$user,'host_str'=>$host_str,'purchase_data'=>$record));

        $to = $record->email;
        $from = sfConfig::get('app_mail_shop_email');
        
        $message = $this->getMailer()->compose();
        $message->setSubject('order processed');
        $message->setTo($to);
        $message->setFrom($from);
        $message->setBody($mailBody, 'text/html');
        $this->getMailer()->send($message);
        }
        }
        }
        }
        }
        
        //$query = PurchaseTable::getInstance()->getAllPurchaseRecords($arr['purchase_order'],$arr['purchase_sort_order']);
        $query = PurchaseTable::getInstance()->getAllPurchaseRecordsByOrders($arr['purchase_order'],$arr['purchase_sort_order'],$arr['purchase_status'],$arr['order_processed_status'],$arr['article_type'],$arr['order_number_txt'],$arr['first_name_txt'],$arr['last_name_txt']);
        $mymarket = new mymarket();
        $this->pager = $mymarket->getPagerForAll('Purchase',$this->rec_per_page,$query,$request->getParameter('page', 1));
        
        }
        */
    }


    /**
     * Executes SaveAsPdf action
     *
     * @param sfRequest $request A request object
     */
    public function executeSaveAsPdf(sfWebRequest $request)
    {
        $purchase = new Purchase();
        $purchasedItem = new PurchasedItem();
        $btShopArticleType = new BtShopArticleType();
        $is_individual_article = $request->getParameter('individual_article');
        if($is_individual_article == 1){
            $this->product_article = new Article();
        }else{
            $this->product_article = new BtShopArticle();
        }
        $profile = new SfGuardUserProfile();
        $subscription = new Subscription();

        $purchase_id = $request->getParameter('purchase_id');
        $this->item_list = $purchasedItem->fecthPurchasedItemList($purchase_id);
        $this->purchase_rec = $purchase->getPurchaseOrder($purchase_id);
        $is_receipt = $request->getParameter('receipt');

        if($is_individual_article == 1){
            if ($is_receipt == 1) {
                $html = $this->getPartial('global/receipt_article', array('host_str' => $host_str, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            } else {
                $html = $this->getPartial('global/invoice_article', array('host_str' => $host_str, 'item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }
        }else{
            if ($is_receipt == 1) {
                $html = $this->getPartial('global/receipt', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            } else {
                $html = $this->getPartial('global/invoice', array('item_list' => $this->item_list, 'product_article' => $this->product_article, 'purchase_rec' => $this->purchase_rec, 'profile' => $profile, 'subscription' => $subscription));
            }
        }
        //$html_header = $this->getPartial('global/pdf_header');
        //$html_footer = $this->getPartial('global/pdf_footer');

        require (sfConfig::get('sf_root_dir') . '/plugins/mpdfPlugin/mpdf.php');
        $mpdf = new mPDF('utf-8', 'A4', '', '', 7, 7, 6, 0, 0, 0);

        $mpdf->SetDisplayMode('fullpage');

        $mpdf->SetHTMLHeader('<div style="float:left; position:relative; border:0px solid green;  margin-top:10px; width:100%;"><table style="width:100%;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td colspan="2"><img src="images/bors.jpg" width="120" height="85"  alt="logo" border="0" /></td></tr><tr><td colspan="2"><img src="images/morn_brief.jpg" width="123" height="42" border="0"  alt="morning_briefing" /></td></tr></table></div>');
        $mpdf->SetHTMLFooter('<div style="float:left; position:relative; border:0px solid green; width:100%;">
<table style="font-family: Arial, Helvetica, sans-serif; font-size:10pt;float:left; position:relative;" border="0" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr><td colspan="2" style="color:#999999; font-weight:bold; font-size:12px; line-height:12px;"><span style="color: #2967b3; font-weight:bold; font-size:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Morningbriefing</span></td></tr>
    <tr><td colspan="2"><span style="color: #2967b3; font-weight:bold; font-size:12px; line-height:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Börstjänaren AB</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">Odensgatan 11A, 5tr</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">753 14 Uppsala</td></tr>
    <tr><td colspan="2"></td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">Org.nr/VAT-nr: SE5567244735</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">Bankgiro: 5670-5288</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">Plusgiro: 104 66 96-9</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #2967b3; font-weight:bold; font-size:12px; line-height:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Kundtjänst e-post:</span></td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">info@borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">www.borstjanaren.se</td></tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr><td colspan="2"><span style="color: #2967b3; font-weight:bold; font-size:12px; line-height:12px; float:left; position:relative; width:109px; word-wrap: break-word; text-align:left;">Telefon:</span></td></tr>
    <tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; line-height:12px; color: #463a46;">018 - 55 00 70</td>
    <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;" align="right">Tack för att du handlar på Börstjänaren!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	<tr><td colspan="2" style="padding-bottom:10px;">&nbsp;</td></tr>
</table>
</div>');

        $mpdf->WriteHTML($html);
        $mpdf->Output('Invoice.pdf', 'D');
        return sfView::NONE;
    }

    /**
     * Executes ajax request to delete purchase order
     *
     * @param sfRequest $request A request object
     */
    public function executeDeletePurchaseOrder(sfWebRequest $request)
    {
        Doctrine::getTable('Purchase')->deletePurchaseById($request->getParameter('id'));
        return sfView::NONE;
    }


    /**
     *
     */
    public function executeNewsletterAutomation(sfWebRequest $request)
    {
       $articleCount = $request->getParameter('articleCount');
       $article = $request->getParameter('article');
       
       foreach($article as $key => $value){
           if(!$articleCount--) break;
            $arr = explode("_",$value);
        
            if($arr[0]=="article"){
                $btArticle[] = $arr[1];
            }else{
                $sbtArticle[] = $arr[1];
            }
        }
        $articleCount = $request->getParameter('articleCount');
       
        
        if(count($article)>$articleCount){
            $article = array_slice($article,0,$articleCount);
             $ccount = 0;
             $article1 = array();
            foreach($article as $key =>$value){
                $arr_val = explode("_",$value);
                $article1[] =  $arr_val[0]."_".$arr_val[1].($ccount<=(count($article)/2)+1?"_left":"_right");
                $ccount++;
            }
            $article =  $article1;
           
        }
        if(count($article)<$articleCount){
            $diff = (intVal($articleCount)-intVal(count($article)));
            $arr = Doctrine::getTable('NewsLetter')->getDefaultNewsletterArticle($btArticle,$diff,$diff);
              $ccount = 0;
            foreach($arr as $key =>$value)
                $article[] =  "article_".$value.($ccount++<=(count($arr)/2)+1?"_left":"_right");
            $ccount = 0;
             $article1 = array();
            foreach($article as $key =>$value){
                $arr_val = explode("_",$value);
                $article1[] =  $arr_val[0]."_".$arr_val[1].($ccount<=(count($article)/2)+1?"_left":"_right");
                $ccount++;
            }
             $article =  $article1;
        }
      
        $btArticle =  array();
        $sbtArticle = array();
        foreach($article as $key => $value){
            $arr = explode("_",$value);
            if($arr[0]=="article"){
                $btArticle[] = $arr[1];
            }else{
                $sbtArticle[] = $arr[1];
            }
        }
        $tempArticle = Doctrine::getTable('NewsLetter')->
            getDefaultNewsletterArticle($this->article, 3);
       
        
        $sbtArticle = $request->getParameter('sbtArticle');
        $sbtArticleCount = $request->getParameter('sbtArticleCount');
        $ads = $request->getParameter('ads');
        $adsCount = $request->getParameter('adsCount');
        $blog = $request->getParameter('blog');
        $contactEnquiry = new ContactEnquiry();
        $enquiry = $contactEnquiry->getAllNewContactEnquiryPostQueryNewsletter();
       
        $record = Doctrine::getTable('NewsLetter')->generateNewsLetterRecords($article, $btArticle,
            count($btArticle), $sbtArticle, count($sbtArticle), $ads, $adsCount, $blog);
     
        return $this->renderPartial('borst/newsletter_template', array('articleRecords' =>
            $record[0], 'ads' => $record[1], 'forum_post' => $record[2], 'blog_post' => $record[3],
            'popular_blog' => $record[4], 'profile_photo' => $record[5], 'blog_desc' => $record[6],
            'btList' => $record[7],'articleRecord'=>$article, 'enquiry_data' => $enquiry));

    }

    /**
     *
     */
    public function executeNewsletterManager(sfWebRequest $request)
    {

        $this->article = $request->getParameter('article');
       $articleCount = $request->getParameter("articleCount");
       if(!$articleCount)
           $articleCount = 20;
       
        if(!count($this->article)){
            $this->article = array();
            $arr = Doctrine::getTable('NewsLetter')->getDefaultNewsletterArticle(array(),$articleCount-count($article));
            $ccount = 0;
            foreach($arr as $key =>$value){
                           
                $this->article[] = "article_".$value.($ccount++<=(count($arr)/2)+1?"_left":"_right");
            }
        }
       
        $this->ads = $request->getParameter('ads');
        $this->blog = $request->getParameter('blog');
        $this->id = $request->getParameter('id');
        $this->newsletter_name = $request->getParameter("name");
        if (!$this->blog)
            $this->blog = Doctrine::getTable('NewsLetter')->getDefaultNewsletterBlog();
        //$this->tempArticle = Doctrine::getTable('NewsLetter')->
         //   getDefaultNewsletterArticle($this->article, 3);
       // $this->tempsbtArticle = Doctrine::getTable('NewsLetter')->
       //     getDefaultSbtNewsletterArticle($this->sbtArticle, 3);
       // $this->article = array_slice($this->tempArticle, 0, $request->getParameter("articleCount",
        //    2));
      //  $this->sbtArticle = array_slice($this->tempsbtArticle, 0, $request->
       //     getParameter("sbtArticleCount", 1));
        $this->ads = Doctrine::getTable('NewsLetter')->getDefaultNewsletterAds($this->
            ads, 2);


    }

    /**
     *
     * @param sfWebRequest $request 
     */

    public function executeSaveNewsLetter(sfWebRequest $request)
    {
        $record = Doctrine::getTable('NewsLetter')->find($request->getParameter('id'));
        if (!$record)
            $record = new NewsLetter();

        //set Articles
        $parameter = array_filter($request->getParameter('article'));
        /*$limit = $request->getParameter('articleCount') - count($parameter);
        if ($limit > 0) {
            $result = Doctrine::getTable('Article')->getAllBorstArticleQuery()->limit($limit)->
                andWhere('ba.art_statID !=2')->execute();
            foreach ($result as $obj) {
                $parameter[] = $obj->getArticleId();
            }
        }*/
        $parameter = array_unique($parameter);
        $record->setArticle(implode(",", $parameter));

        //set sbtArticle
        $parameter = array_filter($request->getParameter('sbtArticle'));
        $limit = $request->getParameter('sbtArticleCount') - count($parameter);
        if ($limit > 0) {
            $result = Doctrine::getTable('SbtAnalysis')->getHomeSbtArticles()->andWhere('sa.published != 6')->
                limit($limit)->execute();
            foreach ($result as $obj) {
                $parameter[] = $obj->getId();
            }
        }
        $record->setSbtArticle(implode(",", $parameter));

        //set Ads
        $parameter = array_filter($request->getParameter('ads'));
        $limit = $request->getParameter('adsCount') - count($parameter);
        if ($limit > 0) {
            $result = Doctrine::getTable('SbtAds')->getSbtAdsQuery()->limit($limit)->
                execute();
            foreach ($result as $obj) {
                $parameter[] = $obj->getId();
            }
        }
        $record->setAds(implode(",", $parameter));

        //set blog
        if (!$blog = $request->getParameter('blog')) {
            $blog = Doctrine::getTable('sbtUserBlog')->getAllSbtBlogPostQuery()->limit(1)->
                fetchOne();
            $blog = $blog->getId();
        }
        $record->setBlog($blog);

        $record->setName($request->getParameter("newsletter_name"));
        $record->setPublish(1);
        $record->save();
        $this->redirect('borst/newsletterList');

    }
    /**
     *
     */
    public function executeArticleDialog(sfWebRequest $request)
    {
        $params = $request->getParameter("params",array());
        
        $query = Doctrine::getTable('Article')->getAllBorstArticleQuery();
        $query->andWhere('ba.art_statID !=2');
        $query->andWhereNotIn('ba.article_id',$params);
        
        $this->pager = new sfDoctrinePager('Article', 8);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page'));
        $this->pager->init();
    }

    public function executeSbtArticleDialog(sfWebRequest $request)
    {
       $params = $request->getParameter("params",array());
        $query = Doctrine::getTable('SbtAnalysis')->getHomeSbtArticles();
        $query->andWhere('sa.published != 6');
        $query->andWhereNotIn('sa.id',$params);
        
        $this->pager = new sfDoctrinePager('SbtAnalysis', 8);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page'));
        $this->pager->init();
    }

    public function executeAdsDialog(sfWebRequest $request)
    {
        $query = Doctrine::getTable('SbtAds')->getSbtAdsQuery();
        $this->pager = new sfDoctrinePager('SbtAds', 8);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page'));
        $this->pager->init();
    }
    /**
     *
     */
    public function executeBlogDialog(sfWebRequest $request)
    {
        $query = Doctrine::getTable('SbtUserBlog')->getAllSbtBlogPostQuery();
        $this->pager = new sfDoctrinePager('SbtUserBlog', 8);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page'));
        $this->pager->init();
    }
    /**
     *
     */
    public function executeNewsletterList(sfWebRequest $request)
    {
        if ($request->isMethod('post')) {
            $obj = $request->getParameter('publish');
            $id= $request->getParameter('id');
            if ($id) {
                foreach ($id as $key => $value) {

                    $record = Doctrine::getTable('NewsLetter')->find($key);
                    
                    if($obj[$key])
                        $record->setPublish(1);
                    else
                        $record->setPublish(0);
                    $record->save();
                }
            }
        }
        $this->pager = new sfDoctrinePager('NewsLetter', 10);
        $this->pager->setQuery(Doctrine_Query::create()->from('newsLetter n')->orderby('n.id desc'));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }


    public function executeDeleteNewsletterById(sfWebRequest $request)
    {
        $id = $request->getParameter("id", "");
        Doctrine::getTable("NewsLetter")->deleteNewsLetterRecord($id);
        $pager = new sfDoctrinePager('NewsLetter', 10);
        $pager->setQuery(Doctrine_Query::create()->from('newsLetter n')->orderby('n.id desc'));
        $pager->setPage($request->getParameter('page', $request->getParameter("page", 1)));
        $pager->init();
        return $this->renderPartial('newsletter_list_block', array('pager' => $pager));
    }
    /**
     *
     */
    public function executeNewsletterListBlock(sfWebRequest $request)
    {
        $this->pager = new sfDoctrinePager('NewsLetter', 10);
        $this->pager->setQuery(Doctrine_Query::create()->from('newsLetter'));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        return $this->renderPartial('newsletter_list_block', array('pager' => $this->
            pager));
    }

    /***
    *
    */
    public function executeContactUs(sfWebRequest $request)
    {

        //
        $param = $request->getParameter('id');
        $obj = Doctrine::getTable('ContactUs')->findById($param);
        $contact_us = new ContactUsForm($obj);

        if ($request->isMethod('post')) {


        }
    }

    /**
     * Executes NewsletterForm action
     *
     * @param sfRequest $request A request object
     */
    public function executeNewsletterSend(sfWebRequest $request)
    {

        $newletter_account = new NewsletterAccount();
        $abon_data = AbonTable::getInstance()->getAllAbon();
        $user_status_data = UserStatusTable::getInstance()->getAllUserStatus();

        $abon_arr[0] = '-';
        $user_status_arr[0] = '-';

        foreach ($abon_data as $abon) {
            $abon_arr[$abon->abonid] = $abon->abon_name;
        }
        foreach ($user_status_data as $status) {
            $user_status_arr[$status->userstatid] = $status->userstat;
        }

        $this->allAbon = $abon_arr;
        $this->allUserStatus = $user_status_arr;
        $this->emails = "";
        $this->greenmsg = "";

        $this->host_str = $this->getRequest()->getHost();
        $this->newsletter = Doctrine::getTable("NewsLetter")->getPublishNewsLetter();
        if ($request->isMethod('post')) {
            $arr = $request->getParameterHolder()->getAll();

            $to_array = $arr['mail_to']; //get mail to comma seprated list

            $to_array = explode(",", $to_array); //create mail to array
            //$to_array=count($to_array)?$to_array:$arr['mail_to'];
            $mailBody = $arr['mail_body'];
            $from = sfConfig::get('app_mail_sender_email');

            $message = $this->getMailer()->compose(); //set mailer

            $record = NewsLetterTable::getRecordArray($arr["newsletter_id"]); //get newsletter record
            //set newsletter partial for mail body
            $mailBody = $this->getPartial('borst/newsletter_template', array('articleRecords' =>
                $record[0], 'ads' => $record[1], 'forum_post' => $record[2], 'blog_post' => $record[3],
                'popular_blog' => $record[4], 'profile_photo' => $record[5], 'blog_desc' => $record[6]));

            $message->setSubject($arr['subject']);

            $message->setFrom($from);
            $message->setBody($mailBody, 'text/html');
            foreach ($to_array as $mail_to) {
                $message->setTo($mail_to);
                $this->getMailer()->send($message);
            }


        }
    }

    public function executeGetNewsLetterPreviewLink(sfWebRequest $request)
    {
        $obj = Doctrine::getTable("NewsLetter")->getnewsLetterbyId($request->
            getParameter("id"));
        $link = Doctrine::getTable("NewsLetter")->getLinkParameter($obj);
         return $this->renderText($link);
        
    }

    public function executeGetEmailIdsForNewsletter(sfWebRequest $request)
    {
        $newletter_account = new NewsletterAccount();
        $arr = $this->getRequest()->getParameterHolder()->getAll();
        $emails = $newletter_account->getEmailForNewsletterUser($arr);
        $emails_list = "<blockquote>";
        foreach ($emails as $value)
            $emails_list .= $value . ",";
        $emails_list .= "</blockquote>";
        return $this->renderText($emails_list);
    }
    
    public function executeGetMailProgress(sfWebRequest $request){
        return $this->renderText($this->getUser()->getAttribute('email_sent',0));
    }
    
    public function executeReminderSubcription(sfWebRequest $request){
        $this->host_str = $this->getRequest()->getHost();
        
        $this->product = new BtShopArticle();     
        $this->subscription_types = $this->product->getAllShopArticleTitle();
        
        $this->form = new ReminderSubscriptionForm();
    }
    
    public function executeReminderEndSubcription(sfWebRequest $request) {
        
        $this->objreminderSubscriptionForm = new ReminderSubscriptionForm();
        $formVal = $request->getParameter($this->objreminderSubscriptionForm->getName(), $request->getFiles($this->objreminderSubscriptionForm->getName()));
        $this->objreminderSubscriptionForm->bind($formVal);
        
        if($this->objreminderSubscriptionForm->isValid())
        {
            $this->objreminderSubscriptionForm->save();
        }
        //$this->redirect('borst/subscriptionList');
        //var_dump($formVal);
        die();
    }
    
        
    public function executeEndSubcriptionEmail($request) {
            //$btShopArticle = new BtShopArticle();
            //$get_end_subcription_users_arr = $btShopArticle->getEndSubcriptionUsers();
            
            $get_end_subcription_users_arr = BtShopArticleTable::getEndSubcriptionUsers();
            if($get_end_subcription_users_arr)
            {
                foreach ($get_end_subcription_users_arr as $subcribedusers) {
                    $user_name = $subcribedusers['firstname']." ".$subcribedusers['lastname'];
                    $end_date = $subcribedusers['end_date'];
                    $url = $_SERVER['HTTP_HOST'];
                    $nof_days = $subcribedusers['nof_days'];
                    $subject = $subcribedusers['subject'];
                    $email_contain = $subcribedusers['email_contain'];
                    $product_id = $subcribedusers['product_id'];

                    $mailBody = $this->getPartial('processed_end_scription_mail', array('user_name' => $user_name, 'end_date' => $end_date,'url'=>$url, 'product_id' => $product_id, 'nof_days' => $nof_days, 'email_contain' => $email_contain ));
                    //$to = array(sfConfig::get('app_mail_to_1'));
                    $to = $subcribedusers['email'];                    
                    //$from = sfConfig::get('app_mail_shop_email_1');
                    $from = sfConfig::get('app_mail_shop_email');
                    $message = $this->getMailer()->compose();
                    $message->setSubject('Your Subscription Has Going To Expire');
                    $message->setTo($to);
                    $message->setFrom($from);
                    echo $mailBody; die;
                    $message->setBody($mailBody, 'text/html');
                    $this->getMailer()->send($message);
                }
            }
            else {
                echo "Nothing to send";
                die();
            }
    }
    
        //call EndSubcriptionEmail function to send reminder email to user of scriptions
        //$this->redirect('/borst_shop/EndSubcriptionEmail');
    
    
/*
    *
    * This function is used for listing Subscription.
    *
    */
    public function executeSubscriptionReminderList(sfWebRequest $request)
    {
        //$this->getUser()->setAttribute('parent_menu', 'top_borst_menu');
        //$this->getUser()->setAttribute('submenu_menu', '');
        //$this->getUser()->setAttribute('third_menu', 'subscription');
        $this->host_str = $this->getRequest()->getHost();

        $this->purchase = new Purchase();
        $this->product = new BtShopArticle();
        $subscription = new Subscription();

        if ($request->isMethod('post')) {
            $arr = $this->getRequest()->getParameterHolder()->getAll();
            $subscription->updatePurchase($arr);
        }

        $query = $subscription->getAllSubscriptionReminderQuery();
        //echo $query;

        $mymarket = new mymarket();

        $this->pager = $mymarket->getPagerForAll('ReminderSubscription', 50, $query, $request->
            getParameter('page', 1));

        $this->subscription_types = $this->product->getAllShopArticleTitle();

    }
}
