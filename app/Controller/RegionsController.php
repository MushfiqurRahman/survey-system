<?php
App::uses('AppController', 'Controller');
/**
 * Regions Controller
 *
 * @property Region $Region
 * @property PaginatorComponent $Paginator
 */
class RegionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        
        var $regions, $territories, $towns, $outlets, $outletTypes;

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Region->recursive = 0;
		$this->set('regions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
		$this->set('region', $this->Region->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
			$this->request->data = $this->Region->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid region'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Region->delete()) {
			$this->Session->setFlash(__('Region deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Region was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
        
        /**
         * 
         */
        public function import_universe(){
            if( $this->request->is('post') ){
                if( !empty($this->request->data['Region']['xls_file']) ){
                    //pr($this->data);exit;
                    if( $this->request->data['Region']['xls_file']['error']==0){
                        $renamed_f_name = time().$this->request->data['Region']['xls_file']['name'];
                        if( move_uploaded_file($this->request->data['Region']['xls_file']['tmp_name'], WWW_ROOT.$renamed_f_name) ){
                        	
                            if( $this->_import($renamed_f_name) ){
                                
                                $this->log(print_r($this->outlets, true),'error');
                                
                                if( $this->Region->Territory->Town->Outlet->saveMany($this->outlets) ){
                                    $this->Session->setFlash(__('Data import successful.'));
                                }else{
                                    $this->Session->setFlash(__('Data saving failed!'));
                                }
                            }else{
                                $this->Session->setFlash(__('Data import failed!'));
                            }
                        }else{
                            $this->Session->setFlash(__('File upload failed! Please try again.'));
                        }
                    }else{
                        $this->Session->setFlash(__('Your given file is corrupted! Please try with valid file.'));
                    }
                }else{
                    $this->Session->setFlash(__('You have not selected any file to upload.'));
                }
            }
        }
        
        /**
         * 
         */
        protected function _import( $xlName ){
            
            ini_set('memory_limit','512M');
            set_time_limit(600);
            
            $this->regions = $this->territories = $this->towns = $this->outlets = array();
            
            $startTime = microtime(true);
            
            App::import('Vendor','PHPExcel',array('file' => 'PHPExcel/Classes/PHPExcel.php'));
            
            //here i used microsoft excel 2007
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            //set to read only
            $objReader->setReadDataOnly(true);
            //load excel file
            $objPHPExcel = $objReader->load($xlName);
            $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
            
            $totalRow = $objPHPExcel->getActiveSheet()->getHighestRow();
            
            //echo $totalRow; exit;
            
            //for($i=2; $i<=$totalRow; $i++){                
            //for($i=7; $i<=$totalRow; $i++){    
            for($i=7; $i<=17; $i++){    
                
                $this->outlets[$i-7]['Outlet'] = array();
                
                
                for($j=1;$j<10;$j++){
                    
                    switch($j){
                        case 1:
                            $regionId = $this->_save_region(trim( $objWorksheet->getCellByColumnAndRow($j,$i)->getValue()));
                            break;
                        
                        case 2:
                            $territoryId = $this->_save_territory(trim( $objWorksheet->getCellByColumnAndRow($j,$i)->getValue()), $regionId);
                            break;
                        
                        case 3:
                            $this->outlets[$i-7]['Outlet']['town_id'] = 
                                $this->_save_town(trim( $objWorksheet->getCellByColumnAndRow($j,$i)->getValue()), $territoryId);
                            break;
                        
                        case 4:
                            $this->outlets[$i-7]['Outlet']['name'] = 
                                trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue());
                            break;
                        
                        case 5:
                            $this->outlets[$i-7]['Outlet']['address'] = 
                                trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue());
                            break;
                        
                        case 6:
                            $this->outlets[$i-7]['Outlet']['outlet_type_id'] = 
                                $this->_save_outlet_type(trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue()));
                            break;
                        
                        case 7:
                            $this->outlets[$i-7]['Outlet']['phone'] = 
                                trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue());
                            break;
                        
                        case 8:
                            $this->outlets[$i-7]['Outlet']['class'] = 
                                trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue());
                            break;
                        
                        case 9:
                            $this->outlets[$i-7]['Outlet']['dms_code'] = 
                                trim($objWorksheet->getCellByColumnAndRow($j,$i)->getValue());
                            break;
                    }
                } 
                
                if( empty($this->outlets[$i-7]['Outlet']['town_id']) ){
                    unset($this->outlets[$i-7]);
                }
            }
            $endTime = microtime(true);
            echo 'Total spent time: '.($endTime - $startTime);
            return true;
        }
        
        
        
        /**
         * 
         * Enter description here ...
         * @param unknown_type $region
         */
        protected function _save_region( $regionTitle ){   
            if( !empty($this->regions) && ( isset($this->regions[$regionTitle]) ||
                    isset($this->regions[ strtolower($regionTitle) ])) ){
                return $this->regions[$regionTitle];
            }
            $region['Region']['title'] = $regionTitle;
            $this->Region->create();
            $this->Region->save($region);
            $this->regions[$regionTitle] = $this->Region->id;
            return $this->Region->id;
        }
        
        /**
         * 
         * Enter description here ...
         * @param unknown_type $area
         */
	protected function _save_territory( $territory, $regionId ){
            if( !empty($this->territories) && ( isset($this->territories[$territory]) ||
                    isset($this->territories[ strtolower($territory) ]) ) ){
                return $this->territories[$territory];
            }
            $Trtr['Territory']['title'] = $territory;
            $Trtr['Territory']['region_id'] = $regionId;
            $this->Region->Territory->create();
            $this->Region->Territory->save($Trtr);
            $this->territories[$territory] = $this->Region->Territory->id;
            return $this->Region->Territory->id;
        }
        
        /**
         * 
         * Enter description here ...
         */
	protected function _save_town( $town, $territoryId ){
            if( !empty($this->towns) && ( isset($this->towns[$town]) || 
                    isset($this->towns[ strtolower($town) ]) )){
                return $this->towns[$town];
            }
            $Twn['Town']['title'] = $town;
            $Twn['Town']['territory_id'] = $territoryId;
            $this->Region->Territory->Town->create();
            $this->Region->Territory->Town->save($Twn);
            $this->towns[$town] = $this->Region->Territory->Town->id;
            return $this->Region->Territory->Town->id;
        }
        
        /**
         * 
         * @param array $type
         * @return type
         */
        protected function _save_outlet_type($type){
            if( !empty($this->outletTypes) && ( isset($this->outletTypes[$type]) ||
                    isset($this->outletTypes[ strtolower($type) ])) ){
                return $this->outletTypes[$type];
            }
            $outType['OutletType']['title'] = $type;
            $this->Region->Territory->Town->Outlet->OutletType->create();
            $this->Region->Territory->Town->Outlet->OutletType->save($outType);
            $this->outletTypes[$type] = $this->Region->Territory->Town->Outlet->OutletType->id;
            return $this->Region->Territory->Town->Outlet->OutletType->id;
        }
}
