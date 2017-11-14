
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`title`, `content`, `institution`, `author`, `link`, `type`) VALUES
('An Article', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr',null ,null, 'iam nonumy eirmod tem', '1'),
('Another one', 'consetetur sadipscing elitr', 'At vero eos et accusam et justo duo dolores', 'Whatever',null , '2');


--
-- Dumping data for table `comment`
--


INSERT INTO `comment` (`id`, `article_id`, `title`, `content`) VALUES
(1, 1, 'First', 'This is the first comment!'),
(2, 1, 'Damn', 'Second comment for this aritcle'),
(3, 2, 'Just for fun', 'I dont know what I was thinking...'),
(4, 2, 'Lorem what', 'I wonder who reads this.'),
(5, 2, 'Good buy', 'Hope to see you soon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
