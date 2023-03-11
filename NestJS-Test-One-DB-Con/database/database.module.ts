import { Module } from '@nestjs/common';
import { ConnectionProvider } from './database.providers';
import { ConfigModule } from '@nestjs/config';

@Module({
  imports: [ConfigModule],
  providers: [ConnectionProvider],
  exports: [ConnectionProvider],
})
export class DatabaseModule {}
