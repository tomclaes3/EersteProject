package be.pxl.springboot.controller;

import be.pxl.springboot.domain.Hello;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class SpringBootController {

    @GetMapping(value = "/sayHello/{id}")
    public ResponseEntity<Hello> sayHello(@PathVariable String id,
                                          @RequestParam String sort,
                                          @RequestParam String sig) {

        Hello hello = new Hello();
        hello.setMessage("HelloWorld " + id + " " + sort + " " + sig);
        return new ResponseEntity<>(hello, HttpStatus.OK);
    }
    @GetMapping(value = "/sayHello/{id}")
    @Secured("ROLE_ADMIN")
    public ResponseEntity<Hello> sayHi(@PathVariable String id) {

        Hello hello = new Hello();
        hello.setMessage("HelloWorld " + id);
        return new ResponseEntity<>(hello, HttpStatus.OK);
    }
}
