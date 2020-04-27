～～～公司要做一个淘宝客的项目，需要接入大淘客，官方SDK用的不是很顺手，自己封装了一个～～～

使用方法

## 一、获取接口信息
```php
include '../../../autoload.php';
use \DaTaoKe\Requests\BindSteategyClass;

/**
 * 获取接口信息（终端输出）
 */
function getApiInfo(){
    //获取所有接口完整信息
    //BindSteategyClass::GetAllSteategy(null,true);
    //获取所有接口信息
    //BindSteategyClass::GetAllSteategy();
    //获取指定接口完整信息
    BindSteategyClass::GetAllSteategy("活动商品",true);
    //获取指定接口信息
    //BindSteategyClass::GetAllSteategy("活动商品");
}
getApiInfo();

```
![RUNOOB 图标](http://static.runoob.com/images/runoob-logo.png)
