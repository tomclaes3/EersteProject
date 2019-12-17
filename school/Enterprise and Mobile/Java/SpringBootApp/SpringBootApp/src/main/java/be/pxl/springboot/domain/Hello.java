package be.pxl.springboot.domain;

import java.util.Objects;

public class Hello {

    private String message;

    public Hello() {

    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Hello hello = (Hello) o;
        return Objects.equals(message, hello.message);
    }

    @Override
    public int hashCode() {

        return Objects.hash(message);
    }

    @Override
    public String toString() {
        return "Hello{" +
                "message='" + message + '\'' +
                '}';
    }
}
