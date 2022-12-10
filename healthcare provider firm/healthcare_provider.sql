-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare_provider`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(4) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `department_name` varchar(60) NOT NULL,
  `doctor_charge` varchar(5) NOT NULL,
  `OPD` varchar(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `description` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `hospital_name`, `department_name`, `doctor_charge`, `OPD`, `room_no`, `description`) VALUES
(1, 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'Plastic Surgury', '1200', '1', '301', ''),
(2, 'Queen Marys Hospital(Govt)', 'Blood', '500', '3', '333', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_record`
--

CREATE TABLE `doctors_record` (
  `id` int(4) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `department` varchar(50) NOT NULL,
  `OPD` int(2) NOT NULL,
  `room_no` int(4) NOT NULL,
  `day_schedule` varchar(50) NOT NULL,
  `time_schedule` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_record`
--

INSERT INTO `doctors_record` (`id`, `doctor_name`, `doctor_email`, `hospital_name`, `department`, `OPD`, `room_no`, `day_schedule`, `time_schedule`, `contact_no`) VALUES
(1, 'akshay kumar', 'akshay@gmail.com', 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'orthologist', 3, 205, 'Mon-Fri', '11:00 AM - 12:00 PM', '1122334455');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_chat`
--

CREATE TABLE `doctor_chat` (
  `id` int(4) NOT NULL,
  `allotted_doctor` varchar(30) NOT NULL,
  `patient_email` varchar(50) NOT NULL,
  `doctor` varchar(2000) NOT NULL,
  `patient` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_chat`
--

INSERT INTO `doctor_chat` (`id`, `allotted_doctor`, `patient_email`, `doctor`, `patient`) VALUES
(3, 'Akshay Kumar', 'at@atgmail.com', 'all correct', 'nothing'),
(11, 'Akshay Kumar', 'at@atgmail.com', 'not ok', 'yash'),
(12, 'Akshay Kumar', 'at@atgmail.com', 'This is ok', 'i am the don'),
(13, 'Akshay Kumar', 'at@atgmail.com', 'reply sent', 'Hii i am asmit');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `id` int(4) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `doctor_name` varchar(60) NOT NULL,
  `day_schedule` varchar(40) NOT NULL,
  `time_schedule` varchar(40) NOT NULL,
  `OPD` varchar(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`id`, `hospital_name`, `doctor_name`, `day_schedule`, `time_schedule`, `OPD`, `room_no`, `department_name`) VALUES
(1, 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'Himesh Reshamia', 'Monday-Friday', '10:00 AM -11:00 AM', '1', '301', 'Endocrinologist'),
(2, 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'Rhitik roshan', 'Monday-Friday', '10:00 AM -11:00 AM', '1', '302', 'blood');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(4) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `hospital_name`, `image`, `image_title`, `description`) VALUES
(1, 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'Gate.gif', 'Gate No.1', 'This is the main gate.');

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `checkup` varchar(255) NOT NULL,
  `link` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`id`, `name`, `city`, `state`, `checkup`, `link`) VALUES
(1, 'Pathkind Lab (VDS Blood Collection Centre)', 'Lucknow', 'Uttar Pradesh', 'Urinalysis ', ''),
(2, 'Nivaran Pathology & Testing Collection Centre', 'Lucknow', 'Uttar Pradesh', 'Urinalysis', ''),
(3, 'SRL Diagnostics Blood Collection Lab Home sample Collection ', 'Lucknow', 'Uttar Pradesh', 'Urinalysis', ''),
(4, 'Xpress Pathlabs', 'Lucknow', 'Uttar Pradesh', 'Urinalysis', ''),
(5, 'Pathkind Lab (VDS Blood Collection Centre)', 'Lucknow', 'Uttar Pradesh', 'Blood Test', ''),
(6, 'Dr Lal PathLabs – Patient Service Centre', 'Lucknow', 'Uttar Pradesh', 'Blood Test', ''),
(7, 'INDIAN PATHOLOGY LAB', 'Lucknow', 'Uttar Pradesh', 'Blood Test', ''),
(8, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'Blood Test', ''),
(9, 'Indira Diagnostic Centre And Blood Bank Ltd.', 'Lucknow', 'Uttar Pradesh', 'Blood Test', ''),
(10, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'Electrocardiogram', ''),
(11, 'Universal Diagnostic & Heart Centre', 'Lucknow', 'Uttar Pradesh', 'Electrocardiogram', ''),
(12, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'Electrocardiogram', ''),
(13, 'We Care Diagnostic Center | X-ray, Ultrasound, ECG, Urea, Th', 'Lucknow', 'Uttar Pradesh', 'Electrocardiogram', ''),
(14, 'Apollo Clinic Lucknow', 'Lucknow', 'Uttar Pradesh', 'Cancer Screening Test', ''),
(15, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'Blood Screening Test', ''),
(16, 'PATHKIND LABS', 'Lucknow', 'Uttar Pradesh', 'Cancer Screening Test', ''),
(17, 'SM Cancer Centre,Dr Vibhor Mahendru, Best Cancer Hospital in', 'Lucknow', 'Uttar Pradesh', 'Cancer Screening Test', ''),
(18, 'Cancer clinic - Lucknow', 'Lucknow', 'Uttar Pradesh', 'Cancer Screening Test', ''),
(19, 'Lucknow Cancer Institute', 'Lucknow', 'Uttar Pradesh', 'Cancer Screening Test', ''),
(20, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'X-RAY', ''),
(21, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'X-RAY', ''),
(22, 'PATHKIND LABS', 'Lucknow', 'Uttar Pradesh', 'X-RAY', ''),
(23, 'LabProvider - Blood Test, MRI, PET & CT Scan, Ultrasound, X-', 'Lucknow', 'Uttar Pradesh', 'X-RAY', ''),
(24, 'Sai Kripa | 5D Ultrasound | Senior Radiologist | X-Ray | Blo', 'Lucknow', 'Uttar Pradesh', 'X-RAY', ''),
(25, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'CT Scan', ''),
(26, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'CT Scan', ''),
(27, 'Satyam Diagnostics Centre', 'Lucknow', 'Uttar Pradesh', 'CT Scan', ''),
(28, 'LabProvider - Blood Test, MRI, PET & CT Scan, Ultrasound, X-', 'Lucknow', 'Uttar Pradesh', 'CT Scan', ''),
(29, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'CT Scan', ''),
(30, 'MRI Scan | Ultrasound | CT Scan Center @ Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'MRI Scan', ''),
(31, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'MRI Scan', ''),
(32, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'MRI Scan', ''),
(33, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'PET Scan', ''),
(34, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'PET Scan', ''),
(35, 'PATHKIND LABS', 'Lucknow', 'Uttar Pradesh', 'PET Scan', ''),
(36, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'PET Scan', ''),
(37, 'Apollo Clinic Lucknow', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(38, 'PATHKIND LABS', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(39, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(40, 'Sai Kripa | 5D Ultrasound | Senior Radiologist | X-Ray | Blo', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(41, 'U.P Diagnostic & Research Centre', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(42, 'Charak Diagnostic', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', ''),
(43, 'Park Diagnostic Centre', 'Lucknow', 'Uttar Pradesh', 'Ultrasound', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `id` int(4) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `hospital_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`id`, `contactno`, `email`, `password`, `type`, `hospital_name`) VALUES
(1, '1234567890', 'at@atgmail.com', '12345', 'patient', 'Dr. Shyama Prasad Mukharji(civil) Hospital'),
(2, '1122334455', 'akshay@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Vm1rZ1ZkRzNtUnJrdVZTSg$enKjsk5HbAfGtX3c/2EYnmb3yKoy5oq3HAbkeo56w04', 'doctor', 'Dr. Shyama Prasad Mukharji(civil) Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(4) NOT NULL,
  `notification` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `hospital_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notification`, `date`, `hospital_name`) VALUES
(1, 'This is the notification', '2022-12-04', 'Dr. Shyama Prasad Mukharji(civil) Hospital'),
(2, 'you have one more notification', '2022-12-07', 'Dr. Shyama Prasad Mukharji(civil) Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `ourhospitals`
--

CREATE TABLE `ourhospitals` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `link` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ourhospitals`
--

INSERT INTO `ourhospitals` (`id`, `name`, `city`, `state`, `Type`, `link`) VALUES
(1, 'Dr Shyama Prasad Mukherjee (Civil) Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', 'DrShyamaPrasadMukharji.php'),
(2, 'Queen Marys Hospital(GOVT)', 'Lucknow', 'Uttar Pradesh', 'Government', 'QMHG.php'),
(3, 'Tuberculosis Hospital (Govt.) Thakur ganj Lucknow', 'Lucknow', 'Uttar Pradesh', 'Government', 'THTL.php'),
(4, 'Government Mahila Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', 'GMH.php'),
(5, 'Balrampur Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', 'Balrampur Hospital.php'),
(6, 'Lucknow Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(7, 'Civil Hospital Hazratganj', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(8, 'Veerangana Jhalkari Bai Women and Child Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(9, 'Government Dispensary, High Court Lucknow.', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(10, 'SGPGI Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(11, 'Career Institute of Medical Sciences and Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(12, 'ERA\'s Lucknow Medical College & Hospital', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(13, 'Eram Unani Medical College', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(14, 'Dr. Ram Manohar Lohia Institute of Medical Sciences', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(15, 'King George\'s Medical University', 'Lucknow', 'Uttar Pradesh', 'Government', ''),
(16, 'Nova Hospital Lucknow', 'Lucknow', 'Uttar Pradesh', 'Private', 'Nova Hospital Lucknow.php'),
(17, 'Shekhar Hospital', 'Lucknow', 'Uttar Pradesh', 'Private', 'Shekhar Hospital Lucknow.php'),
(18, 'Nelson Hospital', 'Lucknow', 'Uttar Pradesh', 'Private', 'Nelson Hospital Lucknow.php'),
(19, 'Surya Hospital', 'Lucknow', 'Uttar Pradesh', 'Private', 'Surya Hospital Lucknow.php'),
(20, 'Tender Palm Hospital', 'Lucknow', 'Uttar Pradesh', 'Private', ''),
(21, 'Wellsun Medicity Hospital', 'Lucknow', 'Uttar Pradesh', 'Private', ''),
(22, 'Ajanta Hospital and IVF Centre', 'Lucknow', 'Uttar Pradesh', 'Private', ''),
(23, 'Chandra Hospital Lucknow', 'Lucknow', 'Uttar Pradesh', 'Private', '');

-- --------------------------------------------------------

--
-- Table structure for table `patientquery`
--

CREATE TABLE `patientquery` (
  `id` int(4) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `query` varchar(1500) NOT NULL,
  `answer` varchar(2500) NOT NULL,
  `hospital_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientquery`
--

INSERT INTO `patientquery` (`id`, `doctor`, `customer_email`, `query`, `answer`, `hospital_name`) VALUES
(1, 'Himesh Reshamia', 'at@gmail.com', 'what can i Do?', '', ''),
(2, 'Himesh Reshamia', 'a@a', 'asd', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_bill`
--

CREATE TABLE `patient_bill` (
  `id` int(4) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `bill_link` varchar(200) NOT NULL,
  `net_ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_bill`
--

INSERT INTO `patient_bill` (`id`, `hospital_name`, `email`, `date`, `bill_link`, `net_ammount`) VALUES
(1, 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'at@atgmail.com', '2022-12-04', 'at@atgmail-4-12-bill.pdf', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `id` int(4) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `aadhar_no` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hospital_name` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `allotted_doctor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`id`, `contactno`, `aadhar_no`, `dob`, `username`, `email`, `hospital_name`, `gender`, `age`, `Address`, `allotted_doctor`) VALUES
(1, '1234567890', '123456789012', '2022-12-12', 'Aditya', 'at@atgmail.com', 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'male', '22', 'lko', 'Akshay Kumar'),
(2, '1122334455', '21324', '2022-12-12', 'ram', 'ram@gmail.com', 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'male', '23', 'lko', 'Akshay Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `patient_report`
--

CREATE TABLE `patient_report` (
  `id` int(4) NOT NULL,
  `email` varchar(50) NOT NULL,
  `allotted_doctor` varchar(50) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `Hospital` varchar(100) NOT NULL,
  `report_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_report`
--

INSERT INTO `patient_report` (`id`, `email`, `allotted_doctor`, `patient_name`, `report_type`, `Hospital`, `report_link`) VALUES
(1, 'at@atgmail.com', 'Akshay Kumar', 'Aditya Tiwari', 'CVC', 'Dr. Shyama Prasad Mukharji(civil) Hospital', 'CVC_id-1.pdf'),
(2, 'ram@atgmail.com', 'Akshay Kumar', 'Ram', 'X-RAY', 'Dr. Shyama Prasad Mukharji(civil) Hospital ', 'CVC_id-1.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_record`
--
ALTER TABLE `doctors_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_chat`
--
ALTER TABLE `doctor_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ourhospitals`
--
ALTER TABLE `ourhospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientquery`
--
ALTER TABLE `patientquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_bill`
--
ALTER TABLE `patient_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_report`
--
ALTER TABLE `patient_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors_record`
--
ALTER TABLE `doctors_record`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_chat`
--
ALTER TABLE `doctor_chat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ourhospitals`
--
ALTER TABLE `ourhospitals`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patientquery`
--
ALTER TABLE `patientquery`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_bill`
--
ALTER TABLE `patient_bill`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_report`
--
ALTER TABLE `patient_report`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
