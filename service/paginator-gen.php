<?php 

	class Paginator {
 
     	private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;

		public function __construct( $conn, $query,$query_count) {
     
		    $this->_conn = $conn;
    		$this->_query = $query;
 			$stmt = $this->_conn->prepare($query_count);
 			$stmt-> setFetchMode(PDO::FETCH_ASSOC);
 			$stmt-> execute();
 			$rs = $stmt->fetch();
 			
    		$this->_total = $rs['count'];
     
		}	
		public function getData( $limit = 25, $page = 1 ) {
    		$this->_limit   = $limit;
    		$this->_page    = $page;
 			
    		if ( $this->_limit == 'all' ) {
        		$query      = $this->_query;
    		} else {
        		$query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
    		}

    		$stmt = $this->_conn-> prepare($query);
    		$stmt-> setFetchMode(PDO::FETCH_ASSOC);
    		$stmt->execute();
    		$results = $stmt->fetchAll();

    		$result         = new stdClass();
    		$result->page   = $this->_page;
    		$result->limit  = $this->_limit;
    		$result->total  = $this->_total;
    		$result->data   = $results;
 
    		return $result;
		}

		public function createLinks( $links, $list_class ) {
    		if ( $this->_limit == 'all' ) {
        		return '';
    		}

    		$last       = ceil( $this->_total / $this->_limit );
 
    		$start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    		$end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
 	   		$html       = '<ul class="' . $list_class . '">';
 
    		$class      = ( $this->_page == 1 ) ? "disabled" : "";
    		$html .= '<li class="page-item ' . $class . '"><a  class="page-link" href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    		if ( $start > 1 ) {
        		$html   .= '<li class="page-item"><a  class="page-link" href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        		$html   .= '<li class="page-item disabled"><span>...</span></li>';
    		}
 
    		for ( $i = $start ; $i <= $end; $i++ ) {
        		$class  = ( $this->_page == $i ) ? "active" : "";
        		$html  .= '<li class="page-item ' . $class . '"><a  class="page-link" href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    		}
 
    		if ( $end < $last ) {
        		$html   .= '<li class="page-item disabled"><span>...</span></li>';
        		$html   .= '<li><a  class="page-link" href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    		}
 
		    $class      = ( $this->_page == $last ) ? "disabled" : "";
    		$html    .= '<li class="page-item ' . $class . '"><a  class="page-link" href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
 
    		$html.= '</ul>';
 
    		return $html;
		}
	}
?>