# PracticeOOPandDesignPattern
## Design Pattern – Factory Method
### Factory Method Pattern là gì?
    -Nhiệm vụ của Factory Pattern là quản lý và trả về các đối tượng theo yêu cầu, giúp cho việc khởi tạo đổi tượng một cách linh hoạt hơn.
    -Factory Pattern đúng nghĩa là một nhà máy, và nhà máy này sẽ “sản xuất” các đối tượng theo yêu cầu của chúng ta.
###  Các thành phần cơ bản của một Factory Method:
    -Super Class: môt supper class trong Factory Pattern có thể là một interface, abstract class hay một class thông thường.
    -Sub Classes: các sub class sẽ implement các phương thức của supper class theo nghiệp vụ riêng của nó.
    -Factory Class: một class chịu tránh nhiệm khởi tạo các đối tượng sub class dựa theo tham số đầu vào. Lưu ý: lớp này là Singleton hoặc cung cấp một public static method cho việc truy xuất và khởi tạo đối tượng. Factory class sử dụng if-else hoặc switch-case để xác định class con đầu ra.
    -ví dụ: Các công ty vận chuyển như Giao Hàng tiết kiệm, Giao Hàng Nhanh, ...đều cung cấp API để truy cập đến hệ thống của họ. Team được giao nhiệm vụ thiết kế một API để client có thể sử dụng dịch vụ của một công ty bất kỳ. Hiện tại, phía client chỉ cần sử dụng dịch vụ của 3 công ty là Giao Hàng Nhanh, Giao Hàng Tiết Kiệm và Viettel Post. Tuy nhiên để dễ mở rộng sau này, và phía client mong muốn không cần phải thay đổi code của họ khi cần sử dụng thêm dịch vụ của ngân hàng khác. Với yêu cầu như vậy, chúng ta có thể sử dụng một Pattern phù hợp là Factory Method Pattern.


    **Chương trình được cài đặt theo Factory Pattern như sau:**
    __Supper Class:__
    ```
        public interface CompanyShip {
            public function getName():string;
            public function createOrder($method,$order);
        }
    ```

    __Sub Classes:__
    ```
        class VTP implements CompanyShip {
            public function getName() {
                echo "Viettel Post Company";
            }
        }
    ```
    ```
        class GTTK implements CompanyShip {
            public function getName() {
                echo "Giao Hang Tiet Kiem Company";
            }
        }
    ```
    ```
        class GHN implements CompanyShip {
            public function getName() {
                echo "Giao Hang Nhanh Company";
            }
        }
    ```
    __Factory class:__
    ```
        class CompanyShipFactory{
            public static function getCompanyShipk(CompanyShipType $companyShipType) {
                switch ($companyShipType) {
                case GHTK:
                    return new GTTK();
                    break;
                case GHN:
                    return new GHN();
                    break;
                case VTP:
                    return new VTP();
                    break;
                default:
                    throw new IllegalArgumentException("This company ship type is unsupported");
                }
            }
        }
    ```

    __CompanyShip type:__
    ```
        class CompanyShipType {
            GHTK, GHN, CTP;
        }
    ```
    __Client:__
    ```
        class Client{
            public funtion Getname(){
                $this->CompanyShipFactory::getCompanyShip(GHN);
            }
        }
    ```
