import Api from './Api'

class OffersServices extends Api {

    async exportOffersExcel(data){
        var create = this.post(data, "offers/export")
        return create
    }

}

export default OffersServices
