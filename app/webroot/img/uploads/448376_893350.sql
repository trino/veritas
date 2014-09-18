
run : http://localhost/veritas/jobs/fillboard





CREATE TABLE IF NOT EXISTS `projectboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `Include_on_project_board` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `job_number` int(11) NOT NULL,
  `job_status` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `expiration_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `new_expiration_date` date NOT NULL,
  `security_projected` float NOT NULL,
  `security_deployed` float NOT NULL,
  `logistics_projected` float NOT NULL,
  `logistics_deployed` float NOT NULL,
  `replacement_workers_projected` float NOT NULL,
  `replacement_workers_deployed` float NOT NULL,
  `dry_trailer_projected` float NOT NULL,
  `dry_trailer_deployed` float NOT NULL,
  `box_truck_projected` float NOT NULL,
  `box_truck_deployed` float NOT NULL,
  `box_reefer_projected` float NOT NULL,
  `box_reefer_deployed` float NOT NULL,
  `kitchen_trailer_projected` float NOT NULL,
  `kitchen_trailer_deployed` float NOT NULL,
  `refrigerated_trailer_projected` float NOT NULL,
  `refrigerated_trailer_deployed` float NOT NULL,
  `laundry_trailer_projected` float NOT NULL,
  `laundry_trailer_deployed` float NOT NULL,
  `shower_trailer_projected` float NOT NULL,
  `shower_trailer_deployed` float NOT NULL,
  `housing_trailer_projected` float NOT NULL,
  `housing_trailer_deployed` float NOT NULL,
  `dining_trailer_projected` float NOT NULL,
  `dining_trailer_deployed` float NOT NULL,
  `deployment_start_date` date NOT NULL,
  `tombstone_man_hours` float NOT NULL,
  `contact_info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
