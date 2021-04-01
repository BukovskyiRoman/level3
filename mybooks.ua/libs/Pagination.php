<?php
namespace libs;

class Pagination
{
    public $perPage;
    public $curPage;
    public $uri;
    public $total;
    public $countPages;


    public function __construct($page,$perPage, $total) {
        $this->perPage = $perPage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->curPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    public function getCountPages()
    {
        return ceil($this->total / $this->perPage) ?: 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if (isset($url[0]) && $url[1] != '')
        {
            $params = explode('&', $url[1]);
            foreach ($params as $param)
            {
                if(!preg_match("#page=#", $param)) $uri = "($param)&amp";
            }
        }
        return $uri;
    }

    public function __toString() {
        return $this->getHtml();
    }

    public function getStart() {
        return ($this->curPage - 1) * $this->perPage;
    }

    public function getHtml()
    {
        $back = null;
        $forward = null;
        $startPage = null;
        $endPage = null;
        $page2left = null;
        $page1left = null;
        $page2right = null;
        $page1right = null;

        if ($this->curPage > 1) {
            $back = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->curPage - 1) . "'>&lt;</a></li>";
        }

        if ($this->curPage < $this->countPages) {
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->curPage + 1) . "'>&gt;</a></li>";
        }

        if ($this->curPage > 3) {
            $startPage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }

        if ($this->curPage > 3) {
            $endPage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }

        if ($this->curPage - 1 > 0) {
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->curPage-1) . "'>" . ($this->curPage-1) . "</a></li>";
        }

        if ($this->curPage + 1 <= $this->countPages) {
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->curPage+1) . "'>" . ($this->curPage+1) . "</a></li>";
        }

        if ($this->curPage + 2 <= $this->countPages) {
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->curPage+2) . "'>" . ($this->curPage+2) . "</a></li>";
        }

        return '<ul class="pagination">' . $startPage . $back . $page2left . $page1left . '<li class="active"><a>' . $this->curPage .
            '</a></li>' . $page1right . $page2right . $forward . $endPage . '</ul>';
    }
}