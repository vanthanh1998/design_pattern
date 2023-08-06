

<script>

class Car {
        constructor({name = 'Truck 10',doors = 4, price = '10 VND', customerInfo = {}}){
            this.name = name
            this.doors = doors
            this.price = price
            this.customerInfo = customerInfo
        }
    }

class ServiceLogistics {
    transportClass = Car
    getTransport = (customerInfo) => {
        return new this.transportClass(customerInfo)
    }
}

const carService = new ServiceLogistics()
console.log('CarService::', carService.getTransport({customerInfo:{name: 'thanhrain',cargoVolume: '99'}}))

</script>