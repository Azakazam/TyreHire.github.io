<?php
class workers{
    public $job_id;
    public $company;
    public $jobTitle;
    public $jobDecription;
    public $role;
	public $endTime;
	public $startDate;
    public $expire;
	


  public function getTitle()
	{
		return $this->jobTitle;
	}
}
?>