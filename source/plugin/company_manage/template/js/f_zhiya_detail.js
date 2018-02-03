/**
 * Created by free on 2017/10/1.
 */
window.name = '';
function finish_alert() {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&&finish_recent=true';
    return false;
}
function dis_recent(month) {
    month = month || true;
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_recent=' + month;
    return false;
}
function zhiya_recent(month) {
    month = month || true;
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_zhiya=' + month;
    return false;
}
function gap(is_gap) {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_gap=1';
    return false;
}
function bili_search(bili) {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_bili='+bili;
    return false;
}
function multi_search() {
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&multi_search';
    return false;
}