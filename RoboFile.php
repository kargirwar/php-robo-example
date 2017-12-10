<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
        // define public methods as commands
        public function mvCssFiles() {
                $this->taskCopyDir(["css" => "css-0.1"])->run();
                $this->taskDeleteDir("css")->run();
        }

        public function changeRefs() {
                $this->taskReplaceInFile("index.html")
                        ->regex("#css\\/styles.css#")
                        ->to('/css-0.1/styles.css')
                        ->run();
        }

		public function release() {                                                                                          
				$collection = $this->collectionBuilder();                                                                        
				$collection->addCode([$this, 'mvCssFiles']);                                                                      
				$collection->addCode([$this, 'changeRefs']);                                                                     

				return $collection;                                                                                              
		}   
}
