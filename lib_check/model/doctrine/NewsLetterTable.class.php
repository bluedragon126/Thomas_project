<?php


class NewsLetterTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('NewsLetter');
    }
    public static function getNewsLetterById($id){
        $result  = Doctrine_Query::create()
                                ->from("Newsletter n")
                                ->where("n.id = ?",$id)
                                ->fetchOne();
       return $result;
    }

    public static function getArticleFromDB($obj,$type){
        $obj = explode(",", $obj);
        
        $IdArray = "";
        foreach($obj as $value){
            $arr = explode("_", $value);
            if($type == $arr[0])
                $IdArray.=$arr[1].",";
        }
        $IdArray = substr($IdArray, 0, strlen($IdArray)-1);
        if($type=="article")
            return NewsLetterTable::getArtiacleTitle($IdArray);
        else
            return NewsLetterTable::getSbtArtiacleTitle($IdArray);
    }
    public static function getArtiacleTitle($article){
        $arr = explode(",", $article);
        $result = Doctrine_Query::create()
                                ->select('a.title title')
                                ->from('Article a')
                                ->whereIn('a.article_id ',$arr)
                                ->execute();
        return $result;
    }
    public static function getSbtArtiacleTitle($sbtArticle){
        $arr = explode(",", $sbtArticle);
        $result = Doctrine_Query::create()
                                ->select('a.analysis_title title')
                                ->from('SbtAnalysis a')
                                ->whereIn('a.id ',$arr)
                                ->execute();
        return $result;
    }
    public static function getAdsTitle($ads){
        $arr = explode(",", $ads);
        $result = Doctrine_Query::create()
                                ->select('a.ad_title title')
                                ->from('SbtAds a')
                                ->whereIn('a.id ',$arr)
                                ->execute();
        return $result;
    }
    public static function getBlogTitle($blog){
        $result = Doctrine_Query::create()
                                ->select('s.ublog_title title')
                                ->from('SbtUserBlog s')
                                ->where('s.id =?',$blog)
                                ->fetchOne();
                return $result;

    }
    
    /**
     *
     * @param <type> $obj
     * @return string
     */
    public static function getLinkParameter($obj){
        if($obj){
        $str ='&id='.$obj->getId();
        $arr = explode(",",$obj->getArticle());
        foreach ($arr as $value){
            $str.='&article[]='.$value;
        }
        $str.='&articleCount='.count($arr);

        $arr = explode(",",$obj->getSbtArticle());
        foreach ($arr as $value){
            $str.='&sbtArticle[]='.$value;
        }
        $str.='&sbtArticleCount='.count($arr);

        $arr = explode(",",$obj->getAds());
        foreach ($arr as $value){
            $str.='&ads[]='.$value;
        }
        $str.='&adsCount='.count($arr);
        $str.='&blog='.$obj->getBlog();
        $str.='&name='.$obj->getName();
        return $str;
        }
        else
            return null;
    }

    /**
     *
     * @param <type> $obj
     * @return string
     */
    public static function getFormParameter($obj){
       
        $str.='<input type="hidden" name="article[]" value="'.$obj->getId().'">';
        $arr = explode(",",$obj->getArticle());
        foreach ($arr as $value){
            $str.='<input type="hidden" name="article[]" value="'.$value.'">';
        }
        $str.='<input type="hidden" name="articleCount" value="'.count($arr).'">';

        $arr = explode(",",$obj->getSbtArticle());
        foreach ($arr as $value){
            $str.='<input type="hidden" name="sbtArticle[]" value="'.$value.'">';
        }
        $str.='<input type="hidden" name="sbtArticleCount]" value="'.count($arr).'">';

        $arr = explode(",",$obj->getAds());
        foreach ($arr as $value){
            $str.='<input type="hidden" name="ads[]" value="'.$value.'">';
        }
        $str.=' <input type="hidden" name="adsCount" value="'.count($arr).'">';
        $str.=' <input type="hidden" name="blog" value="'.$obj->getBlog().'">';
        $str.='<input type="Submit" class="registerbuttontext" value="Edit" style="width: 50px">';
        
        return $str;
    }

    /**
     *
     * @param <type> $id
     * @return string 
     */
    public static function getRecordArray($id){
        $result = Doctrine_Query::create()
                                ->from('NewsLetter n')
                                ->where('n.id =?',$id)
                                ->fetchOne();
        if($result){
            $article = explode(',', $result->getArticle()); //set article
          
            $articleCount = count($article); //set article count
            $sbtArticle = explode(',', $result->getSbtArticle()); //set sbtArticle
              
            $sbtArticleCount = count($sbtArticle); //set sbtArticleCount
            $ads = explode(',', $result->getAds()); //set ads
            
            $adsCount = count($ads); //set ads count
            $blog = $result->getBlog();
            $records = NewsLetterTable::generateNewsLetterRecords($article, $articleCount, $sbtArticle, $sbtArticleCount, $ads, $adsCount, $blog);
        }
        else
            $records = null;
        
        return $records;

        

    }

    /**
     *
     * @param <type> $article
     * @param <type> $articleCount
     * @return <type> 
     */
    public static function getDefaultNewsletterArticle($article,$articleCount,$flag = null){
        $parameter = $article;
        
        $parameter = array_filter($parameter);
        $limit = $articleCount-count($parameter);
        $limit = $limit<=0? 9:$limit;
        if($flag)
            $limit = $flag;
        if(!$parameter || $limit>0){
            //get all borst article record with limit value
            $query = Doctrine::getTable('Article')->getAllBorstArticleQuery();
            $query->andWhere('ba.art_statID !=2');
     
            if($parameter)
                $query->andWhereNotIn('ba.article_id',$parameter);
            $result = $query->limit($limit)->execute();

            if($flag != null )
                $parameter = array();
            foreach($result as $obj){
                $parameter[] = $obj->getArticleId(); //set article id
            }
        }
        return $parameter;
    }

    /**
     *
     * @param <type> $sbtArticle
     * @param <type> $sbtArticleCount
     * @return <type>
     */
    public static function getDefaultSbtNewsletterArticle($sbtArticle,$sbtArticleCount){
        $parameter = $sbtArticle;
        $parameter = array_filter($parameter);
        $limit = $sbtArticleCount-count($parameter);
         $limit = $limit<=0? 1:$limit;
        if(!$parameter || $limit>0){
           // $parameter = array();
            $query = Doctrine::getTable('SbtAnalysis')->getHomeSbtArticles();
            $query->andWhere('sa.published != 6');
            if($parameter)
                $query->andWhereNotIn('sa.id',$parameter);
            $result = $query->limit($limit)->execute();
            foreach($result as $obj){
                $parameter[] = $obj->getId();
            }
        }
        return $parameter;
    }

    /**
     *
     * @param <type> $ads
     * @param <type> $adsCount 
     */
    public static function getDefaultNewsletterAds($ads,$adsCount){
        $parameter = $ads;
        $parameter = array_filter($parameter);
        $limit = $adsCount-count($parameter);
        if(!$parameter || $limit>0){
         //   $parameter = array();
            $result = Doctrine::getTable('SbtAds')->getSbtAdsQuery()->limit($limit)->execute();
            
            foreach($result as $obj){
                $parameter[] = $obj->getId();
            }
        }
        return $parameter;
    }
    /**
     *
     * @return <type> 
     */
    public static function  getDefaultNewsletterBlog(){
            $sbt_vote_detail = new SbtVoteDetails();
             $sbt_user_blog = new SbtUserBlog();
             $user_id_arr = $sbt_vote_detail->getTopThreeMostVotedBlogger(1);
             $blog_id_arr = $sbt_user_blog->getLatestBlogId($user_id_arr);
             $sbt_blog_comment = new SbtBlogComment();
             $popular_blog = $sbt_user_blog->getBlogInOrder($blog_id_arr);
             return $popular_blog [0];
    }

    public static function getArticleArray($articleRecords,$article_obj,$count){
              $articleRecords['article_id'] = $article_obj->article_id; //set article id
              $articleRecords['type'] = Doctrine::getTable('ArticleType')->getArticleTypeName($article_obj->type_id); //set article type
              $articleRecords['category'] = Doctrine::getTable('ArticleCategory')->getArticleCategoryName($article_obj->category_id); //set article category
              $articleRecords['commnet'] = Doctrine::getTable('BorstArticleComment')->getCommentCountFromId($article_obj->article_id); //set comment cout
              $articleRecords['title'] = $article_obj->title; //set article title
              $articleRecords['image'] = $article_obj->image; //set article image
              $articleRecords['date'] = $article_obj->article_date; //set article date
              $articleRecords['name'] = 'article'; //set article name
              $articleRecords['no'] = $count+1;
              $articleRecords['description'] = $article_obj->image_text; //set article image text
              return $articleRecords;
    }

    public static function getSbtArticleArray($articleRecords,$article_obj,$count){
              $articleRecords['name'] = 'sbtArticle'; //set sbt article name
              $articleRecords['article_id'] = $article_obj->id; //set sbt article id
              $articleRecords['type'] = Doctrine::getTable('SbtArticleType')->getSbtArticleTypeName($article_obj->analysis_type_id); //set article type
              $articleRecords['category'] = Doctrine::getTable('SbtArticleCategory')->getSbtArticleCategoryName($article_obj->analysis_category_id); //set article category
              $articleRecords['commnet'] = Doctrine::getTable('SbtAnalysisComment')->getCommentCountFromId($article_obj->id); //set comment cout
              $articleRecords['no'] = $count+1; //set no
              $articleRecords['date'] = $article_obj->created_at; //set date
              $articleRecords['title'] = $article_obj->analysis_title; //set sbt article title
              $articleRecords['image'] = $article_obj->image; //set image
              $articleRecords['description'] = $article_obj->image_text; //set text image
               return $articleRecords;
    }
    /**
     * method generateNewsLetterRecords
     * @param  $article
     * @param  $articleCount
     * @param  $sbtArticle
     * @param  $sbtArticleCount
     * @param  $ads
     * @param  $adsCount
     * @param  $blog
     * @return $record
     * method is defined to retrive record for newsletter
     */
    public static function generateNewsLetterRecords($articleArr,$article,$articleCount,$sbtArticle,$sbtArticleCount,$ads,$adsCount,$blog){
        $articleRecords = array();
        //for borst article
        //$parameter = NewsLetterTable::getDefaultNewsletterArticle($article,$articleCount);
       
       $count = 0;
       foreach ($articleArr as $key => $value) {
            $arr = explode("_", $value);
            if ($arr[0] == "article") {
                $article_obj = Doctrine::getTable('Article')->find($arr[1]); //get article record
                if ($article_obj) {
                    $articleRecords[$count] = array(); //set new array
                    $articleRecords[$count] = NewsLetterTable::getArticleArray($articleRecords[$count], $article_obj, $count);
                }
            } else {
                $article_obj = Doctrine::getTable('SbtAnalysis')->find($arr[1]);

                if ($article_obj) {
                    $articleRecords[$count] = array();
                    $articleRecords[$count] = NewsLetterTable::getSbtArticleArray($articleRecords[$count], $article_obj, $count);
                }
            }
            $count++;
        }
       /* foreach($parameter as $param){
            $article_obj = Doctrine::getTable('Article')->find($param); //get article record
            //set article object in array
            if($article_obj){
              $articleRecords[$count] =  array(); //set new array
               $articleRecords[$count] = NewsLetterTable::getArticleArray($articleRecords[$count],$article_obj,$count);
               $count++;
            }
        }
       
        //for SBT article
        $parameter = NewsLetterTable::getDefaultSbtNewsletterArticle($sbtArticle,$sbtArticleCount);
       
        $cc = 1;
       
        foreach($parameter as $param){
            
            $article_obj = Doctrine::getTable('SbtAnalysis')->find($param);
           
            if($article_obj){
              $articleRecords[$count] =  array();
              $articleRecords[$count] = NewsLetterTable::getSbtArticleArray($articleRecords[$count],$article_obj,$count);
             
              $count++;
            }
        }*/
       
        //for ads
        $adsRecord = array();
        $parameter = $ads;
        $parameter = array_filter($parameter);
        $limit = $adsCount-count($parameter);
        if(!$parameter || $limit>0){
         //   $parameter = array();
            $result = Doctrine::getTable('SbtAds')->getSbtAdsQuery()->limit($limit)->execute();
            foreach($result as $obj){
                $parameter[] = $obj->getId();
            }
        }
        foreach($parameter as $param){
            $ads_obj = Doctrine::getTable('SbtAds')->getAdString($param);
            if($ads_obj){
                $adsRecord[] = $ads_obj;
            }
        }
        
        //for recent forum post
        $forum_post = Doctrine::getTable('Btforum')->getAllNewForumPostQuery()->limit(3)->execute();

        //for recent blogs
        $blog_post = Doctrine::getTable('sbtuserBlog')->getAllSbtBlogPostQuery()->limit(3)->execute();

        //for popular bloggar
        $parameter = $blog;
        if(!$parameter)
        {
            
             $popular_blog  = NewsLetterTable::getDefaultNewsletterBlog();
           
        }
        else
            $popular_blog = Doctrine::getTable('sbtUserBlog')->find($parameter);
     
        if($popular_blog){
            $profile_photo = new SbtUserprofilePhoto();

            $profile_photo = $profile_photo->searchForRecord($popular_blog->author_id);

            $blog_desc = Doctrine::getTable('sbtUserBlog')->shortBlogDescription($popular_blog);
            
            //$popular_blog->setUblogDescription(utf8_encode(Doctrine::getTable('sbtUserBlog')->shortBlogDescription($popular_blog)));

        }
        //$btList = ArticleTable::getInstance()->getHomeAktier(0,10,$isSuperAdmin);
        $btList = Doctrine::getTable('Article')->getAllBorstArticleQuery()->andWhere('ba.art_statID !=2')->limit(10)->execute();
        $record = array();
        $record[]= $articleRecords; //set articles record
        $record[]=$adsRecord; //set ads records
        $record[]=$forum_post; //set forum post
        $record[]=$blog_post; //set blog post
        $record[]=$popular_blog; //set popular blog
        $record[]=$profile_photo; //set profile photo
        $record[]=$blog_desc; //set blog
        $record[]=$btList; //set bt list
        return $record;
    }

    /**
     * method getPublishNewsLetter
     * return records of publish newsletters
     */
    public function getPublishNewsLetter(){
        $result = Doctrine_Query::create()
                            ->from("NewsLetter n")
                            ->where("n.publish = 1")
                            ->orderBy('n.id DESC')
                            ->execute();
        return $result;
    }

    public function deleteNewsLetterRecord($id){
        $record = Doctrine_Query::create()
                                ->delete()
                                ->from('NewsLetter n')
                                ->where('n.id =?',$id)
                                ->execute();
    }

    public static function  getStringBetween($string, $start, $end){
        $string = " ".$string;
         $ini = strpos($string,$start);
         if ($ini == 0) return "";
         $ini += strlen($start);
         $len = strpos($string,$end,$ini) - $ini;
         return substr($string,$ini,$len);
    }

}