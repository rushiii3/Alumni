
<?php
class Alumni {
    private $firstname;
    private $middlename;
    private $lastname;
    private $dob;
    private $linkedin_address;
    private $phone_number;
    private $email;
    private $bachelor_degree;
    private $bachelor_admission_passing_year;
    private $bachelor_degree_college;
    private $master_degree;
    private $master_admission_passing_year;
    private $master_degree_college;
    private $company;
    private $designation;

    public function __construct(
        $firstname,
        $middlename,
        $lastname,
        $dob,
        $linkedin_address,
        $phone_number,
        $email,
        $bachelor_degree,
        $bachelor_admission_passing_year,
        $bachelor_degree_college,
        $master_degree,
        $master_admission_passing_year,
        $master_degree_college,
        $company,
        $designation
    ) {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->dob = $dob;
        $this->linkedin_address = $linkedin_address;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->bachelor_degree = $bachelor_degree;
        $this->bachelor_admission_passing_year = $bachelor_admission_passing_year;
        $this->bachelor_degree_college = $bachelor_degree_college;
        $this->master_degree = $master_degree;
        $this->master_admission_passing_year = $master_admission_passing_year;
        $this->master_degree_college = $master_degree_college;
        $this->company = $company;
        $this->designation = $designation;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getMiddlename() {
        return $this->middlename;
    }

    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getDob() {
        return $this->dob;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getLinkedinAddress() {
        return $this->linkedin_address;
    }

    public function setLinkedinAddress($linkedin_address) {
        $this->linkedin_address = $linkedin_address;
    }

    public function getPhoneNumber() {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number) {
        $this->phone_number = $phone_number;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getBachelorDegree() {
        return $this->bachelor_degree;
    }

    public function setBachelorDegree($bachelor_degree) {
        $this->bachelor_degree = $bachelor_degree;
    }

    public function getBachelorAdmissionPassingYear() {
        return $this->bachelor_admission_passing_year;
    }

    public function setBachelorAdmissionPassingYear($bachelor_admission_passing_year) {
        $this->bachelor_admission_passing_year = $bachelor_admission_passing_year;
    }

    public function getBachelorDegreeCollege() {
        return $this->bachelor_degree_college;
    }

    public function setBachelorDegreeCollege($bachelor_degree_college) {
        $this->bachelor_degree_college = $bachelor_degree_college;
    }

    public function getMasterDegree() {
        return $this->master_degree;
    }

    public function setMasterDegree($master_degree) {
        $this->master_degree = $master_degree;
    }

    public function getMasterAdmissionPassingYear() {
        return $this->master_admission_passing_year;
    }

    public function setMasterAdmissionPassingYear($master_admission_passing_year) {
        $this->master_admission_passing_year = $master_admission_passing_year;
    }

    public function getMasterDegreeCollege() {
        return $this->master_degree_college;
    }

    public function setMasterDegreeCollege($master_degree_college) {
        $this->master_degree_college = $master_degree_college;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function getDesignation() {
        return $this->designation;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }
}







?>