
    <?php
    // Interface definition
    interface CompanyShip
    {
        public function getName();
        // public function createOrder($method,$order);
    }

    // Class definitions

    class VTP implements CompanyShip
    {
        public function getName()
        {
            echo "Viettel Post Company";
        }
    }

    class GTTK implements CompanyShip
    {
        public function getName()
        {
            echo "Giao Hang Tiet Kiem Company";
        }
    }

    class GHN implements CompanyShip
    {
        public function getName()
        {
            echo "Giao Hang Nhanh Company";
        }
    }
    class CompanyShipType
    {
        const SHIPPING_GHN = "GHN";
        const SHIPPING_GHTK = "GHTK";
        const SHIPPING_VTP = "VTP";
    }
    // Create a list of animals
    class CompanyShipFactory
    {
        public function getCompanyShip($companyShipType)
        {
            switch ($companyShipType) {
                case CompanyShipType::SHIPPING_GHTK:
                    return (new GTTK())->getName();
                    break;
                case CompanyShipType::SHIPPING_GHN:
                    return( new GHN())->getName();
                    break;
                case CompanyShipType::SHIPPING_VTP:
                    return( new VTP())->getName();
                    break;
                default:
                    echo 'false';
            }
        }
    }
    class Client
    {
        public function Getname($name)
        {
            (new CompanyShipFactory())->getCompanyShip($name);
        }
    }

    echo (new Client())->Getname('GHN');
    ?>
