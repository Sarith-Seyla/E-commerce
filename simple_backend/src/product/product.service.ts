import { Injectable } from '@nestjs/common';
import { CreateProductDto } from './dto/create-product.dto';
import { UpdateProductDto } from './dto/update-product.dto';
import { Product } from './entities/product.entity';
import { InjectModel } from '@nestjs/sequelize';

@Injectable()
export class ProductsService {
  constructor(
    @InjectModel(Product)
    private productRepository: typeof Product,
  ) {}

  create(createProductDto: CreateProductDto) {
    return this.productRepository.create(createProductDto as any);
  }

  findAll() {
    return this.productRepository.findAll();
  }
  update(id: number, updateProductDto: UpdateProductDto) {
    const result = this.productRepository.update(updateProductDto as any, {
      where: { id },
      returning: true,
    });

    if (!result) {
      throw new Error('Product not found');
    }

    return 'update success';
  }

  delete(id: number) {
    const result = this.productRepository.destroy({ where: { id } });
    if (!result) {
      throw new Error('product not found');
    }
    return 'delete success';
  }
}
