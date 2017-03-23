
--
-- Database: `test`
-- Table structure for table `client_profile`
--

CREATE TABLE `client_profile` (
  `id` int(15) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(20) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_profile`
--

INSERT INTO `client_profile` (`id`, `first_name`, `last_name`, `address`, `state`, `zip`, `email`) VALUES
(1234, 'John', 'Constantine', '888 magician roan', 'New York', 10001, 'jconstantine@email.com'),
(4444, 'Lucas', 'Hood', 'address', 'Pennsylvania', 4044, 'email'),
(6789, 'Steven', 'Strange', 'address', 'Florida', 500006, 'email');

-- --------------------------------------------------------
-- Table structure for table `insurableevent`
--

CREATE TABLE `insurableevent` (
  `incident_id` int(10) NOT NULL,
  `client_id` int(15) NOT NULL,
  `incident_type` text NOT NULL,
  `description` text NOT NULL,
  `outcome` text NOT NULL,
  `owner_fault` int(5) NOT NULL,
  `other_fault` int(5) NOT NULL,
  `cost` int(15) NOT NULL,
  `resolved` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `insurableevent`

INSERT INTO `insurableevent` (`incident_id`, `client_id`, `incident_type`, `description`, `outcome`, `owner_fault`, `other_fault`, `cost`, `resolved`) VALUES
(33, 1234, 'Broken Doorlock', 'I broke my door lock', 'Cannot lock the door', 1, 0, 300, 1),
(55, 6789, 'Stolen', 'My car was stolen last night', 'stolen car', 0, 1, 15000, 0),
(66, 1234, 'Accident', 'Car crash yesterday at 2.30pm', 'broken window', 0, 1, 10000, 0),
(100, 6789, 'Accident', 'Car crash yesterday at 2.30pm', 'broken window', 1, 0, 15000, 0),
(4000, 4444, 'Tire puncture', 'My car tire was punctured yesterday', 'Someone else did it', 0, 1, 250, 1);

-- --------------------------------------------------------
-- Table structure for table `insurancecost`

CREATE TABLE `insurancecost` (
  `client_id` int(15) NOT NULL,
  `total_incident` int(15) NOT NULL,
  `total_ownfault` int(15) NOT NULL,
  `total_otherfault` int(15) NOT NULL,
  `total_cost` int(15) NOT NULL,
  `total_resolved` int(15) NOT NULL,
  `insurance_cost` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Table structure for table `vehicle`

CREATE TABLE `vehicle` (
  `vehicle_id` int(10) NOT NULL,
  `client_id` int(15) NOT NULL,
  `vehicle_name` text NOT NULL,
  `vehicle_number` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `vehicle`

INSERT INTO `vehicle` (`vehicle_id`, `client_id`, `vehicle_name`, `vehicle_number`, `state`) VALUES
(888, 1234, 'Ford', '5555', 'Florida'),
(4490, 4444, 'Mustang', '0040', 'Texas'),
(9999, 6789, 'Tesla', '0000', 'new york');


-- Index for table `client_profile`
--
ALTER TABLE `client_profile`
  ADD PRIMARY KEY (`id`);

--
-- Index for table `insurableevent`
--
ALTER TABLE `insurableevent`
  ADD PRIMARY KEY (`incident_id`);

--
-- Index for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

