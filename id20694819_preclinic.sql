-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 07:34 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20694819_preclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `aid` varchar(255) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pEmail` varchar(255) NOT NULL,
  `pPhone` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `aid`, `pName`, `department`, `doctor`, `date`, `time`, `pEmail`, `pPhone`, `msg`, `status`) VALUES
(3, 'APT-0001', '6', '19', '13', '0000-00-00', '12:43:00', 'kapili897@gmail.com', '08908776553', '', 1),
(4, 'APT-0002', '5', '12', '7', '0000-00-00', '04:39:00', 'mano2@gmail.com', '09776441255', '', 1),
(5, 'APT-0003', '7', '11', '12', '0000-00-00', '02:40:00', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `status`) VALUES
(2, 'Anesthetics', '\r\nDoctors in this department give anesthetic for operations and procedures. An anesthetic is a drug or agent that produces a complete or partial loss of feeling. There are three kinds of anesthetic: general, regional, and local.', 1),
(3, 'Breast Screening', 'Screens women for breast cancer and is usually linked to the X-ray or radiology department.', 1),
(4, 'Cardiology', 'Provides medical care to patients who have problems with their heart or circulation.', 1),
(5, 'Central Sterile Services Department (CSSD)', '(Sterile Processing Department (SPD) - Sterile Processing - Central Supply Department (CSD) - Central Supply) - A place in hospitals and other health care facilities that performs sterilization and other actions on medical equipment, devices, and consumables.', 0),
(6, 'Chaplaincy', 'Chaplains promote the spiritual and pastoral well-being of patients, relatives, and staff.', 1),
(7, 'Coronary Care Unit (CCU)', '(Cardiac intensive care unit (CICU) - A hospital ward specialized in the care of patients with heart attacks, unstable angina, cardiac dysrhythmia and other cardiac conditions that require continuous monitoring and treatment.', 1),
(8, 'Diagnostic Imaging', 'Also known as X-Ray Department and/or Radiology Department.', 0),
(9, 'Gastroenterology', 'This department investigates and treats digestive and upper and lower gastrointestinal diseases.', 1),
(10, 'General Surgery', 'Covers a wide range of types of surgery and procedures on patients.', 1),
(11, 'Gynecology', 'Investigates and treats problems relating to the female urinary tract and reproductive organs, such as Endometriosis, infertility, and incontinence.', 1),
(12, 'Hematology', 'These hospital services work with the laboratory. In addition, doctors treat blood diseases and malignancies related to the blood.', 1),
(13, 'Intensive Care Unit (ICU)', '(Intensive Therapy Unit, Intensive Treatment Unit (ITU), Critical Care Unit (CCU) - A special department of a hospital or health care facility that provides intensive treatment medicine and caters to patients with severe and life-threatening illnesses and injuries, which require constant, close monitoring and support from specialist equipment and medications.', 1),
(14, 'Infection Control', 'Primarily responsible for conducting surveillance of hospital-acquired infections and investigating and controlling outbreaks or infection clusters among patients and health care personnel. The department calculates rates of hospital-acquired infections, collates antibiotic susceptibility data, performs analysis of aggregated infection data, and provides comparative data to national benchmarks over time.\r\n', 1),
(15, 'Maternity Ward', 'Maternity wards provide antenatal care, delivery of babies and care during childbirth, and postnatal support.', 1),
(16, 'Microbiology', 'The microbiology department provides an extensive clinical service, including mycology, parasitology, mycobacteriology, a high-security pathology unit, and a healthcare-associated infection investigation unit, as well as routine bacteriology and an expanding molecular diagnostic repertoire.', 1),
(17, 'Neonatal', 'Closely linked with the hospital maternity department, provides care and support for babies and their families.', 0),
(18, 'Nephrology', 'Monitors and assesses patients with various kidney (renal) problems and conditions.', 1),
(19, 'Neurology', 'A medical specialty dealing with disorders of the nervous system. Specifically, it deals with the diagnosis and treatment of all categories of disease involving the central, peripheral, and autonomic nervous systems, including their coverings, blood vessels, and all effector tissue, such as muscle. Includes the brain, spinal cord, and spinal cord injuries (SCI).', 1),
(20, 'Nutrition and Dietetics', 'Dietitians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics.', 1),
(21, 'Obstetrics', 'Specialist nurses, midwives, and imaging technicians provide maternity services such as antenatal and postnatal care, maternal and fetal surveillance, and prenatal diagnosis.', 1),
(22, 'Occupational Therapy', 'Helps physically or mentally impaired people, including temporary disabilities, practice in the fields of both healthcare as well as social care. Often abbreviated as \"OT,\" Occupational Therapy promotes health by enabling people to perform meaningful and purposeful occupations. These include (but are not limited to) work, leisure, self-care, and domestic and community activities. Occupational therapists work with individuals, families, groups, and communities to facilitate health and well-being through engagement or re-engagement in occupation.', 1),
(23, 'Oncology', 'A branch of medicine that deals with cancer and tumors. A medical professional who practices oncology is an oncologist. The Oncology department provides treatments, including radiotherapy and chemotherapy, for cancerous tumors and blood disorders.', 1),
(24, 'Ophthalmology', 'Ophthalmology is a branch of medicine that deals with the diseases and surgery of the visual pathways, including the eye, hairs, and areas surrounding the eye, such as the lacrimal system and eyelids. The term ophthalmologist is an eye specialist for medical and surgical problems. The Ophthalmology department provides ophthalmic eye-related services for both in and outpatients.', 1),
(25, 'Orthopedics', 'Treats conditions related to the musculoskeletal system, including joints, ligaments, bones, muscles, tendons, and nerves.', 1),
(26, 'Otolaryngology', 'The ENT Department provides comprehensive and specialized care covering both Medical and Surgical conditions related not just specifically to the Ear, Nose, and Throat, but also other areas within the Head and Neck region. It is often divided into sub-specialties dealing with only one part of the traditional specialty (ontology, rhinology, and laryngology).', 1),
(27, 'Pharmacy', 'Responsible for drugs in a hospital, including purchasing, supply, and distribution.', 1),
(28, 'Physiotherapy', 'Physiotherapists work through physical therapies such as exercise, massage, and manipulation of bones, joints and muscle tissues.', 1),
(29, 'Radiology', 'The branch or specialty of medicine that deals with the study and application of imaging technology like x-ray and radiation to diagnosing and treating disease. The Department of Radiology is a highly specialized, full-service department that strives to meet all patient and clinician needs in diagnostic imaging and image-guided therapies.', 1),
(30, 'Radiotherapy', 'Also called radiation therapy, is the treatment of cancer and other diseases with ionizing radiation.', 1),
(31, 'Rheumatology', 'Rheumatologists care for and treat patients for musculoskeletal disorders such as bones, joints, ligaments, tendons, muscles, and nerves.', 1),
(32, 'Urology', 'The urology department is run by consultant urology surgeons and investigates areas linked to kidney and bladder conditions.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `dfName` varchar(255) NOT NULL,
  `dlName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `dfName`, `dlName`, `email`, `dob`, `gender`, `address`, `phone`, `avatar`, `department`, `bio`, `status`) VALUES
(4, 'Dr. Manohari', 'Dash', 'mano2@gmail.com', '27/03/1969', 'Male', 'Plot : 435, Subham Vihar, Sambalpur', '9776441255', '556860apu3.jpg', '10', '                                                     Very Experienced in Surgery', 0),
(7, 'Dr. Manomalini', 'Rath', 'malini77@gmail.com', '28/11/1981', 'Female', 'Plot : 34-A, Near Rangamahata Road, Jagatpur', '8989765439', '452868jodie-comer-most-beautiful-woman-p.png', '3', '                                                     ', 0),
(9, 'Dr. Rasmiranjan', 'Sahoo', 'rasmi20@gmail.com', '29/05/2002', 'Male', 'Plot - 243, Patra Sahi, Cuttack', '7328789007', '495556istockphoto-1045886560-612x612.jpg', '12', '                                                     ', 0),
(10, 'Dr. Syamali', 'Mohanty', 'syamss.23@yahoo.com', '07/10/1982', 'Female', 'Plot : 89, Shibamani Vihar, Raipur', '7654356789', '429009gettyimages-1293903541-612x612.jpg', '15', '                                                     ', 0),
(11, 'Dr. Abhijit ', 'Behera', 'abhi7789@gmail.com', '28/08/1987', 'Male', 'Plot : 908, Koradakanta, Pandra, Khordha', '7655789034', '385829young.jpg', '16', '                                                     ', 0),
(12, 'Dr. Subham', 'Panigrahi', 'subhu99@yahoo.com', '26/05/1977', 'Male', 'Plot : 76, Kuntala Niwas, Malkanagir,Odisha', '9090342798', '879973male.jpg.jpg', '4', '                                                     ', 0),
(13, 'Dr. Samarpita', 'Malla', 'samark@gmail.com', '11/05/1985', 'Female', 'Plot : 678, Bhoi Nagar, Bhubaneswar', '6377890345', '596317pink.jpg', '11', '                                                     ', 0),
(14, 'Dr. Soniya Singh', 'Rathore', 'sonia.rathore@gmail.com', '28/09/1991', 'Female', 'Mumbai, India', '8890876545', '180958pexels-photo-733872.jpg', '9', '                                                     ', 0),
(15, 'Dr. Parul ', 'Awasthi', 'parulawas@yahoo.com', '18/03/1976', 'Male', 'Plot : 99, Kamala Nagar, Gajapati', '6789934509', '303919depositphotos_201608550-stock-photo-image-amazing-young-pretty-woman.jpg', '21', '                                                     ', 0),
(16, 'Dr. Aveek', 'Pani', 'aveekram@yahoo.com', '13/05/1988', 'Male', 'Plot : 567, Belloi Nagar, Raygada', '9090879654', '555127360_F_214746128_31JkeaP6rU0NzzzdFC4khGkmqc8noe6h.jpg', '32', '                                                     ', 0),
(17, 'Dr. Kapilendra', 'Behera', 'kapili897@gmail.com', '07/10/1969', 'Male', 'Plot ; 1717/1215, Mancheswar, Bhubaneswar', '8908776553', '841611download (1).jpeg', '24', '                                                     ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fName`, `lName`, `email`, `password`, `dob`, `age`, `gender`, `address`, `phone`, `status`) VALUES
(1, 'Apurba Sundar', 'Nayak', 'apurbasundar998@gmail.com', 'asn123', '27/05/2002', '21', 'Male', 'BBSR', '9776441255', 0),
(2, 'Rashmi Ranjan ', 'Sahoo', 'ranjanrashmi809@gmail.com', 'Rashmi@123', '30/01/2003', '20', 'Male', 'Mancheswar, Bhubaneswar', '9078739943', 0),
(3, 'Soumya Sephalika', 'Sahoo', 'ss.soumya@gmail.com', 'Soumya@123', '11/05/2002', '21', 'Female', 'Cuttack', '8556789034', 0),
(4, 'Dinesh Kumar', 'Jena', 'dinesh809@gmail.com', 'Dinesh@123', '12/06/2002', '21', 'Male', 'Badambadi Square, Cuttack', '7665782340', 0),
(5, 'Biswanath', 'Behera', 'biswabehera12@gmail.com', 'Biswa@123', '02/05/2002', '21', 'Male', 'Nayapalli, Bhubaneswar', '9435678901', 0),
(6, 'Swagat Sambit', 'Swain', 'swagatsambit34@gmail.com', 'Swagat@123', '24/09/2003', '20', 'Male', 'Sriram Nagar, Bhubaneswar', '8776449622', 0),
(7, 'Rebel ', 'Swain', 'rebelisal@gmail.com', 'Rebel@123', '25/06/2003', '20', 'Male', 'CDA 1, Cuttack', '8776553499', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `password`, `cpassword`) VALUES
('Apurba Sundar Nayak', 'apu@gmail.com', '123', '123'),
('Rasmiranjan Sahoo', 'rasmi@gmail.com', '12345', '12345'),
('apurba', 'apurba@gmail.com', '12345', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
