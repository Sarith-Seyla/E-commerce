import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
  UploadedFile,
  UseInterceptors,
} from '@nestjs/common';
import { PromotionsService } from './promotion.service';
import { CreatePromotionDto } from './dto/create-promotion.dto';
import { FileInterceptor } from '@nestjs/platform-express';
import { MulterOptions } from '@nestjs/platform-express/multer/interfaces/multer-options.interface';
import * as multer from 'multer';

const multerOptions: MulterOptions = {
  storage: multer.diskStorage({
    destination: './uploads/promotion',
    filename: (req, file, callback) => {
      const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1e9);
      callback(null, uniqueSuffix + '-' + file.originalname);
    },
  }),
  limits: {
    fileSize: 1 * 1024 * 1024, // Limit file size to 1MB
  },
};

@Controller('api/promotions')
export class PromotionsController {
  constructor(private readonly promotionService: PromotionsService) {}

   @Get()
    findAll(): any {
      return this.promotionService.findAll();
    }
  
    @Post()
    @UseInterceptors(FileInterceptor('image', multerOptions))
    createPromotion(
      @UploadedFile() image: Express.Multer.File,
      @Body() body: CreatePromotionDto,
    ): any {
      const Promotion = this.promotionService.create({
        ...body,
        image: image.path,
      });
      return Promotion;
    }
  
    @Patch(':id')
    @UseInterceptors(FileInterceptor('image', multerOptions))
    updatePromotion(
      @Param('id') id: number,
      @UploadedFile() image: Express.Multer.File,
      @Body() body: CreatePromotionDto,
    ): any {
      const Promotion = this.promotionService.update(id, {
        ...body,
        image: image.path,
      });
      return Promotion;
    }
  
    @Delete(':id')
    deletePromotion(@Param('id') id: number): any {
      const result = this.promotionService.delete(id);
      return result;
    }
}
