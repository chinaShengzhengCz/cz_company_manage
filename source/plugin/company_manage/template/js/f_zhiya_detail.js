/**
 * Created by free on 2017/10/1.
 */
function finish_alert() {
    window.name = '';
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&&finish_recent=true';
    return false;
}
function dis_recent(month) {
    month = month || true;
    window.name = '';
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_recent=' + month;
    return false;
}
function zhiya_recent(month) {
    month = month || true;
    window.name = '';
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&is_zhiya=' + month;
    return false;
}
function multi_search() {
    window.name = '';
    window.location.href = '/plugin.php?id=company_manage:company_zhiya_list_front&redirect=true&multi_search';
    return false;
}